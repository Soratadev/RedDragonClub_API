<?php

namespace App\Controller\Boardgame;

use App\Entity\Boardgame;
use App\Form\Type\BoardgameFormType;
use App\Services\CreateBoardgameService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class CreateBoardgameController extends AbstractController
{
    public function __construct(
        private readonly CreateBoardgameService $createBoardgameService,
    ){}
    #[Route('/boardgame/create', name: 'app_create_boardgame', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $boardgame = new Boardgame();
        $form = $this->createForm(BoardgameFormType::class, $boardgame);
        $form->submit($data);
        return $this->createBoardgameService->createBoardgame($data, $boardgame, $form);
    }
}

