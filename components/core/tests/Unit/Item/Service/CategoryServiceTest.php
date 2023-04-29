<?php

declare(strict_types=1);

namespace App\Tests\Unit\Item\Service;

use App\Repository\Item\CategoryRepository;
use App\Service\Item\CategoryService;
use App\Tests\Factory\Item\CategoryFactoryTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CategoryServiceTest extends TestCase
{
    use CategoryFactoryTrait;

    private CategoryRepository|MockObject $categoryRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryRepository = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testItSavesCategory(): void
    {
        $category = $this->createCategory('Testcategory', 'Testdescription');

        $this->categoryRepository->expects(self::once())->method('save')->with($category);
        $this->getService()->save($category);
    }

    public function testItRemovesCategory(): void
    {
        $category = $this->createCategory('Testcategory', 'Testdescription');

        $this->categoryRepository->expects(self::once())->method('remove')->with($category);
        $this->getService()->remove($category);
    }

    public function testItFindsAllCategoriess(): void
    {
        $this->categoryRepository->expects(self::once())->method('findAll');
        $this->getService()->findAll();
    }

    private function getService(
        CategoryRepository|MockObject $categoryRepository = null,
    ): CategoryService {
        return new CategoryService(
            $categoryRepository ?? $this->categoryRepository,
        );
    }
}
