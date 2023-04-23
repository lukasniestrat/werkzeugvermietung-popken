<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Item\Service;

use App\Repository\Item\ItemRepository;
use App\Service\Item\ItemService;
use App\Tests\Factory\Item\CategoryFactoryTrait;
use App\Tests\Factory\Item\ItemFactoryTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ItemServiceTest extends TestCase
{
    use ItemFactoryTrait,
        CategoryFactoryTrait;

    private ?ItemService $service = null;

    private ItemRepository | MockObject $itemRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->itemRepository = $this->getMockBuilder(ItemRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function test_it_saves_item(): void
    {
        $item = $this->createItem(
            $this->createCategory('Testcategory', 'Testdescription'),
            'Testtitle',
            70.00,
        );

        $this->itemRepository->expects(self::once())->method('save')->with($item);
        $this->getService()->save($item);
    }

    public function test_it_removes_item(): void
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
        ItemRepository | MockObject $itemRepository = null,
    ): ItemService
    {
        return new ItemService(
            $itemRepository ?? $this->itemRepository,
        );
    }
}