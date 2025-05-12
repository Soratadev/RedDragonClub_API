<?php

namespace App\Controller\Booking;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class GetAllBookingController extends AbstractController
{
    #[Route('/get/all/booking', name: 'app_get_all_booking')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/GetAllBookingController.php',
        ]);
    }
}
