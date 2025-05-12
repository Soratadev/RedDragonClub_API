<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class GetBookingController extends AbstractController
{
    #[Route('/get/booking', name: 'app_get_booking')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GetBookingController.php',
        ]);
    }
}
