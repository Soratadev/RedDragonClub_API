<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class UserRegisterController extends AbstractController
{
    #[Route('/auth/register', name: 'auth_register', methods: ['OPTIONS', 'POST'])]
    public function register(
        Request $request,
        UserPasswordHasherInterface $hasher,
        EntityManagerInterface $em
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Validaciones mínimas
        if (empty($data['email']) || empty($data['password'])) {
            return new JsonResponse(['error' => 'Email and password are required'], 400);
        }

        $user = new User();
        $user->setEmail($data['email']);
        $user->setUsername($data['username'] ?? '');
        $user->setDateOfJoining(new \DateTime());
        $user->setBirthdate(new \DateTime($data['birthdate'] ?? '01-01-2000'));
        $user->setIsAdmin(false);


        // Hashear contraseña
        $user->setPassword(
            $hasher->hashPassword($user, $data['password'])
        );

        $em->persist($user);
        $em->flush();

        return new JsonResponse(['message' => 'User registered'], 201);

    }
}