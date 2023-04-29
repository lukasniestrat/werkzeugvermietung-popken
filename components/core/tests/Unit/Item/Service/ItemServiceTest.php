<?php

declare(strict_types=1);

namespace App\Tests\Unit\Item\Service;

use App\Repository\Item\ItemRepository;
use App\Service\Item\ItemService;
use App\Tests\Factory\Item\CategoryFactoryTrait;
use App\Tests\Factory\Item\ItemFactoryTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ItemServiceTest extends TestCase
{
    use ItemFactoryTrait;
    use CategoryFactoryTrait;

    private ItemRepository|MockObject $itemRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->itemRepository = $this->getMockBuilder(ItemRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testItSavesItem(): void
    {
        $item = $this->createItem(
            $this->createCategory('Testcategory', 'Testdescription'),
            'Testtitle',
            70.00,
        );

        $this->itemRepository->expects(self::once())->method('save')->with($item);
        $this->getService()->save($item);
    }

    public function testItRemovesItem(): void
    {
        $item = $this->createItem(
            $this->createCategory('Testcategory', 'Testdescription'),
            'Testtitle',
            70.00,
        );

        $this->itemRepository->expects(self::once())->method('remove')->with($item);
        $this->getService()->remove($item);
    }

    private function getService(
        ItemRepository|MockObject $itemRepository = null,
    ): ItemService {
        return new ItemService(
            $itemRepository ?? $this->itemRepository,
        );
    }
}
