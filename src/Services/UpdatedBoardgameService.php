<?php

namespace App\Services;

use App\Entity\Boardgame;
use App\Repository\BoardgameRepository;
use App\Services\GetErrorService;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdatedBoardgameService extends GetErrorService
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
        private readonly AddCategoriesService $addCategoriesService,
    ){}
    public function updatedBoardgame($data, int $id, FormInterface $form)
    {
        $result = new JsonResponse();
        $boardgame = $this->boardgameRepository->find($id);
        if (!$boardgame) {
            $result = new JsonResponse(['message' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addCategoriesService->addCategories($boardgame, $data);
            $this->boardgameRepository->saveBoardgame($boardgame);
            $result = new JsonResponse(['message' => 'Board game created successfully'], Response::HTTP_CREATED);
        }

    }

}