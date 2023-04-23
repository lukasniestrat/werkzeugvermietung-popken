<?php

declare(strict_types=1);

namespace App\Factory\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Item;

class ItemFactory
{
    public static function createItem(
        string $title,
        float $price,
        ?string $description,
        ?string $imageUrl,
        ?string $dataSheetUrl,
        ?Category $category,
        bool $newArticle = false,
        bool $topArticle = false,
    ): Item {
        $item = new Item($title, $price);
        $item->setCategory($category)
            ->setDescription($description)
            ->setImageUrl($imageUrl)
            ->setDataSheetUrl($dataSheetUrl)
            ->setNewArticle($newArticle)
            ->setTopArticle($topArticle);

        return $item;
    }
}
