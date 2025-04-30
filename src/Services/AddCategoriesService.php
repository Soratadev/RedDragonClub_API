<?php

namespace App\Services;

use App\Entity\Boardgame;
use App\Repository\BoardgameRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddCategoriesService extends GetErrorService
{
    public function __construct(
        private readonly CategoryRepository  $categoryRepository,
    )
    {}
    public function addCategories(Boardgame &$boardgame, $data): void
    {
        if (isset($data['categories']) && is_array($data['categories'])) {
            foreach ($data['categories'] as $categoryId) {
                $category = $this->categoryRepository->find($categoryId);
                if ($category) {
                    $boardgame->addCategory($category);
                }
            }
        }
    }
}