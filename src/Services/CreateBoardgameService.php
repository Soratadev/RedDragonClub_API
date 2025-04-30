<?php

namespace App\Services;

use App\Entity\Boardgame;
use App\Repository\BoardgameRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateBoardgameService extends GetErrorService
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
        private readonly AddCategoriesService $addCategoriesService,
    ){}
    public function createBoardgame($data, Boardgame $boardgame, FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $this->addCategoriesService->addCategories($boardgame, $data);
            $this->boardgameRepository->saveBoardgame($boardgame);
            return new JsonResponse(['message' => 'Board game created successfully'], Response::HTTP_CREATED);
        }
        return new JsonResponse([
            'status' => 'error',
            'errors' => $this->getFormErrors($form),
        ], 422);
    }

}