<?php

namespace App\Controller;

use App\Entity\Boardgame;
use App\Form\Type\BoardgameFormType;
use App\Repository\BoardgameRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\CategoryRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class CreateBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
        private readonly CategoryRepository  $categoryRepository,
        private readonly ValidatorInterface  $validator,
    ){}

    #[Route('/boardgame/create', name: 'app_create_boardgame', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $boardgame = new Boardgame();

        $form = $this->createForm(BoardgameFormType::class, $boardgame);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            if (isset($data['category']) && is_array($data['category'])) {
                foreach ($data['category'] as $categoryId) {
                    $category = $this->categoryRepository->find($categoryId);
                    if ($category) {
                        $boardgame->addCategory($category);
                    }
                }
            }
            $this->boardgameRepository->saveBoardgame($boardgame);
            return new JsonResponse(['message' => 'Board game created successfully'], Response::HTTP_CREATED);
        }
        return new JsonResponse(['message' => 'Board game not created.'], Response::HTTP_BAD_REQUEST);
    }
}
