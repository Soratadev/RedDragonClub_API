<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    )
    {}
    #[Route('/categories', name: 'app_get_category', methods: ['GET'])]
    public function getCategory(): JsonResponse
    {
        $result = new JsonResponse();
        $categories = $this->categoryRepository->findAll();
        if (!$categories) {
            $result = new JsonResponse(['message' => 'Categories not found.'], Response::HTTP_NOT_FOUND);
        } else {
            $categories = array_map(function ($category) {
                return [
                    'id' => $category->getId(),
                    'name' => $category->getName()
                ];
            }, $categories);

            $result = new JsonResponse($categories, Response::HTTP_OK);
        }
        return $result;
    }
}
