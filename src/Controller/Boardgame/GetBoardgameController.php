<?php

namespace App\Controller\Boardgame;

use App\Repository\BoardgameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GetBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
    ){}

    #[Route('/boardgame/{id}', name: 'app_find_boardgame', methods: ['GET'])]
    public function getBoardgame(int $id): JsonResponse
    {
        $result = new JsonResponse();
        $boardgame = $this->boardgameRepository->find($id);
        if (!$boardgame) {
            $result = new JsonResponse(['message' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
        }

        $categories = array_map(function ($category) {
            return [
                'id' => $category->getId(),
                'name' => $category->getName()
            ];
        }, $boardgame->getCategories()->toArray());

        $boardgameData = [
            'id' => $boardgame->getId(),
            'name' => $boardgame->getName(),
            'designer' => $boardgame->getDesigner(),
            'players' => $boardgame->getPlayers(),
            'playingTime' => $boardgame->getPlayingTime(),
            'complexity' => $boardgame->getComplexity(),
            'age' => $boardgame->getAge(),
            'description' => $boardgame->getDescription(),
            'cover' => $boardgame->getCover(),
            'categories' => $categories
        ];

        return new JsonResponse($boardgameData, Response::HTTP_OK);

    }
}
