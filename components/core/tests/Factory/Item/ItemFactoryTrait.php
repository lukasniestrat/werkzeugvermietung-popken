<?php

declare(strict_types=1);

namespace App\Tests\Factory\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Item;
use App\Tests\Utils\ReflectionFactory;

trait ItemFactoryTrait
{
    private function createItem(
        Category $category,
        string $title,
        float $price
    ): Item {
        $item = ReflectionFactory::createInstanceOfClass(Item::class);
        ReflectionFactory::setPrivateProperty($item, 'category', $category);
        ReflectionFactory::setPrivateProperty($item, 'title', $title);
        ReflectionFactory::setPrivateProperty($item, 'price', $price);

        return $item;
    }
}
