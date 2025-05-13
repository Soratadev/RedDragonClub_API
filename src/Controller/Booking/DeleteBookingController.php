<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteBookingController extends AbstractController
{
    #[Route('/booking/delete', name: 'app_delete_booking')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DeleteBookingController.php',
        ]);
    }
}
