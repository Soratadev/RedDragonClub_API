<?php

namespace App\Controller;

use App\Repository\BoardgameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteBoardgameController extends AbstractController
{
    public function __construct(
        private readonly BoardgameRepository $boardgameRepository
    ) {}

    #[Route('/boardgame/delete/{id}', name: 'app_delete_boardgame', methods: ['DELETE'])]
    public function deleteBoardgame(int $id): JsonResponse
    {
        $result = new JsonResponse();
        try {
            $boardgame = $this->boardgameRepository->find($id);
            if (!$boardgame) {
                $result = new JsonResponse(['error' => 'Board game not found.'], Response::HTTP_NOT_FOUND);
            }
            $this->boardgameRepository->removeBoardgame($boardgame);
            $result = new JsonResponse(['message' => 'Board game deleted successfully'], Response::HTTP_OK);

        } catch (\Exception $e) {
            $result = new JsonResponse(
                ['error' => 'Error when deleting the board game: ' . $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        return $result;
    }
}
