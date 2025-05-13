<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateUserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){}
    #[Route('/auth/user/edit/{id}', name: 'app_update_user', methods: ['PUT'])]
    public function updateUser(Request $request, int $id): JsonResponse
    {
        $result = new JsonResponse();
        $user = $this->userRepository->find($id);
        if (!$user) {
            $result = new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $data = json_decode($request->getContent(), true);
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setDateOfBirth($data['dateOfBirth']);

        $this->userRepository->saveUser($user);
        $result = new JsonResponse(['message' => 'User updated successfully'], Response::HTTP_OK);
        return $result;
    }

}
