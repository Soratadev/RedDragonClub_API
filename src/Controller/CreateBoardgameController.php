<?php

namespace App\Controller;

use App\Entity\Boardgame;
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
    ) {
    }

    #[Route('/boardgame/create', name: 'app_create_boardgame', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Validar campos requeridos
//        $requiredFields = ['title', 'designer', 'complexity', 'age'];
//        foreach ($requiredFields as $field) {
//            if (!isset($data[$field])) {
//                throw new \InvalidArgumentException("the {$field} field is required");
//            }
//        }

        $boardgame = new Boardgame();
        $boardgame->setTitle($data['title']);
        $boardgame->setDesigner($data['designer']);
        $boardgame->setPlayers($data['players']);
        $boardgame->setPlayingTime($data['playingTime']);
        $boardgame->setComplexity($data['complexity']);
        $boardgame->setAge($data['age']);
        $boardgame->setDescription($data['description']);
        // Manejar categorías
        if (isset($data['category']) && is_array($data['category'])) {
            foreach ($data['category'] as $categoryId) {
                $category = $this->categoryRepository->find($categoryId);
                if ($category) {
                    $boardgame->addCategory($category);
                }
            }
        }
        $boardgame->setCover($data['cover']);

        $errors = $this->validator->validate($boardgame);
        if (count($errors) > 0) {
            //$errorsString = (string) $errors;
            return new JsonResponse(json_encode($errors), Response::HTTP_BAD_REQUEST);
        }

        $this->boardgameRepository->saveBoardgame($boardgame);

        return new JsonResponse(['message' => 'Juego de mesa creado exitosamente'], Response::HTTP_CREATED);
    }
}
