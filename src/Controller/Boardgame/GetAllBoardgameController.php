<?php

namespace App\Controller\Boardgame;

use App\Repository\BoardgameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GetAllBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository,
    )
    {}

    #[Route('/public/catalog', name: 'app_boardgames', methods: ['GET'])]
    public function findAllBoardgames(): JsonResponse
    {
        $result = new JsonResponse();
        $boardgames = $this->boardgameRepository->findAll();
        if (!$boardgames) {
            $result = new JsonResponse(['message' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
        } else {
            $boardgamesData = array_map(function ($boardgame) {
                $categories = array_map(function ($category) {
                    return [
                        'id' => $category->getId(),
                        'name' => $category->getName()
                    ];
                }, $boardgame->getCategories()->toArray());

                return [
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
            }, $boardgames);

            $result = new JsonResponse($boardgamesData, Response::HTTP_OK);
        }
        return $result;
    }
}
