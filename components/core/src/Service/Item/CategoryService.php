<?php
declare(strict_types = 1);
namespace App\Service\Item;

use App\Entity\Item\Category;
use App\Repository\Item\CategoryRepository;

readonly class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    ) {
    }

    public function save(Category $category, bool $flush = false): Category
    {
        return $this->categoryRepository->save($category, $flush);
    }

    public function remove(Category $category, bool $flush = false): Category
    {
        return $this->categoryRepository->remove($category, $flush);
    }

    /**
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->categoryRepository->findAll();
    }
}