<?php
declare(strict_types = 1);
namespace App\Service\Item;

use App\Repository\Item\CategoryRepository;

readonly class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    /**
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->categoryRepository->findAll();
    }
}