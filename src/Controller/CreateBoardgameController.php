<?php

namespace App\Controller;

use App\Entity\Boardgame;
use App\Repository\BoardgameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class CreateBoardgameController extends AbstractController
{
    #[Route('/boardgame/create', name: 'app_create_boardgame', methods: ['POST'])]
    public function create(Request $request, BoardgameRepository $boardgameRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $boardgame = new Boardgame();
        $boardgame->setTitle($data['title']);
        $boardgame->setDesigner($data['designer']);
        $boardgame->setPlayers($data['players']);
        $boardgame->setPlayingTime($data['playingTime']);
        $boardgame->setComplexity($data['complexity']);
        $boardgame->setAge($data['age']);
        $boardgame->setDescription($data['description']);
        $arrayCategories = $data['category'];
        foreach ($arrayCategories as $category) {
            $boardgame->addCategory($category);
        }

        $boardgameRepository->saveBoardgame($boardgame);

        return new JsonResponse(['message' => 'Boardgame created successfully']);
    }
}
