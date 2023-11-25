<?php

declare(strict_types=1);

namespace App\Service\Item;

use App\Entity\Item\Item;
use App\Model\Common\ModelList;
use App\Model\Common\RequestMetaData;
use App\Repository\Item\ItemRepository;

readonly class ItemService
{
    public function __construct(
        private ItemRepository $itemRepository,
    ) {
    }

    public function save(Item $item, bool $flush = false): Item
    {
        return $this->itemRepository->save($item, $flush);
    }

    public function remove(Item $item, bool $flush = false): Item
    {
        return $this->itemRepository->remove($item, $flush);
    }

    public function getItems(RequestMetaData $requestMetaData): ModelList
    {
        return $this->itemRepository->getItems($requestMetaData);
    }

    public function getItemById(int $id): Item
    {
        return $this->itemRepository->getItemById();
    }
}
