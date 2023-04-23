<?php
declare(strict_types = 1);
namespace App\Tests\Unit\Item\Factory;

use App\Factory\Item\ItemFactory;
use App\Tests\Factory\Item\CategoryFactoryTrait;
use PHPUnit\Framework\TestCase;

class ItemFactoryTest extends TestCase
{
    use CategoryFactoryTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_it_creates_item(): void
    {
        $category = $this->createCategory('Test', 'This is a test');
        $item = ItemFactory::createItem(
            'Testtitle',
            70.00,
            'Testdescription',
            '/public/image.png',
            'public/datasheet.pdf',
            $category,
            true,
            true,
        );

        self::assertEquals('Testtitle', $item->getTitle());
        self::assertEquals(70.00, $item->getPrice());
        self::assertEquals('Testdescription', $item->getDescription());
        self::assertEquals('/public/image.png', $item->getImageUrl());
        self::assertEquals($item->getCategory()->getTitle(), $category->getTitle());
        self::assertTrue($item->isNewArticle());
        self::assertTrue($item->isTopArticle());
    }
}