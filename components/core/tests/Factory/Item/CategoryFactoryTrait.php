<?php

declare(strict_types=1);

namespace App\Tests\Factory\Item;

use App\Entity\Item\Category;
use App\Tests\Utils\ReflectionFactory;

trait CategoryFactoryTrait
{
    private function createCategory(
        string $title,
        string $description
    ): Category {
        $category = ReflectionFactory::createInstanceOfClass(Category::class);
        ReflectionFactory::setPrivateProperty($category, 'title', $title);
        ReflectionFactory::setPrivateProperty($category, 'description', $description);

        return $category;
    }
}
