<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GetUserByIdController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ) {}
    #[Route('/auth/user/{id}', name: 'app_get_user_by_id', methods: ['GET'])]
    public function getUserById(int $id): JsonResponse
    {
        $result = new JsonResponse();
        $user = $this->userRepository->find($id);
        if (!$user) {
            $result = new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $userData = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'dateOfBirth' => $user->getDateOfBirth(),
            'dateOfJoining' => $user->getDateOfJoining(),
            'roles' => $user->getRoles()
        ];
        return new JsonResponse($userData, Response::HTTP_OK);
    }
}
