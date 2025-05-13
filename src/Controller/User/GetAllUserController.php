<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class GetAllUserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
    ){}
    #[Route('/auth/user', name: 'app_get_all_user')]
    public function findAllUser(): JsonResponse
    {
        $result = new JsonResponse();
        $users = $this->userRepository->findAll();
        if (!$users) {
            $result = new JsonResponse(['message' => 'Users not found'], Response::HTTP_NOT_FOUND);
        } else {
            $usersData = array_map(function ($user) {
                return [
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                    'dateOfBirth' => $user->getDateOfBirth(),
                    'dateOfJoining' => $user->getDateOfJoining(),
                    'roles' => $user->getRoles()
                ];
            }, $users);
            $result = new JsonResponse($usersData, Response::HTTP_OK);
        }
        return $result;
    }
}
