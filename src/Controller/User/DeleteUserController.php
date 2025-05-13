<?php

namespace App\Controller\User;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteUserController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){}
    #[Route('/auth/user/delete/{id}', name: 'app_delete_user', methods: ['DELETE'])]
    public function deleteUser(int $id): JsonResponse
    {
        $result = new JsonResponse();
        try{
            $user = $this->userRepository->find($id);
            if (!$user) {
                $result = new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
            }
            $this->userRepository->removeUser($user);
            $result = new JsonResponse(['message' => 'User deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            $result = new JsonResponse(
                ['error' => 'Error when deleting the user: ' . $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        return $result;
    }
}
