<?php

namespace App\Controller\Boardgame;

use App\Form\Type\BoardgameFormType;
use App\Repository\BoardgameRepository;
use App\Services\AddCategoriesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
        private readonly AddCategoriesService $addCategoriesService,
    ){}
    #[Route('/boardgame/edit/{id}', name: 'app_update_boardgame', methods: ['PUT'])]
    public function updateBoardgame(Request $request, int $id): JsonResponse
    {
        $result = new JsonResponse();
        $boardgame = $this->boardgameRepository->find($id);
        if (!$boardgame) {
            $result = new JsonResponse(['message' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(BoardgameFormType::class, $boardgame);
        $form->submit($data);

        if ($form->isValid()) {
            // clear existing categories
            foreach ($boardgame->getCategories() as $category) {
                $boardgame->removeCategory($category);
            }
            $this->addCategoriesService->addCategories($boardgame, $data);

            $this->boardgameRepository->saveBoardgame($boardgame);

            $result = new JsonResponse(['message' => 'Board game updated successfully'], Response::HTTP_OK);
        } else {
            $result = new JsonResponse(['error' => 'Please enter valid data for a board game'], Response::HTTP_BAD_REQUEST);
        }
        return $result;
    }
}
