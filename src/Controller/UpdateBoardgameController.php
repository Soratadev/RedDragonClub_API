<?php

namespace App\Controller;

use App\Form\Type\BoardgameFormType;
use App\Repository\BoardgameRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
        private readonly CategoryRepository  $categoryRepository,
    ){}



    #[Route('/boardgame/edit/{id}', name: 'app_update_boardgame', methods: ['PUT'])]
    public function updateBoardgame(Request $request, int $id): JsonResponse
    {
        $boardgame = $this->boardgameRepository->find($id);
        if (!$boardgame) {
            return new JsonResponse(['message' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(BoardgameFormType::class, $boardgame);
        $form->submit($data);

        if ($form->isValid()) {
            // clear existing categories
            foreach ($boardgame->getCategories() as $category) {
                $boardgame->removeCategory($category);
            }
            // add new categories from the form
            if (isset($data['category']) && is_array($data['category'])) {
                foreach ($data['category'] as $categoryId) {
                    $category = $this->categoryRepository->find($categoryId);
                    if ($category) {
                        $boardgame->addCategory($category);
                    }
                }
            }
            $this->boardgameRepository->saveBoardgame($boardgame);
            return new JsonResponse(['message' => 'Board game updated successfully'], Response::HTTP_OK);
        }

        return new JsonResponse(['error' => 'Please enter valid data for a board game'], Response::HTTP_BAD_REQUEST);
    }
}
