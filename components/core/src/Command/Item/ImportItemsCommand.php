<?php
declare(strict_types = 1);
namespace App\Command\Item;

use App\Entity\Item\Category;
use App\Factory\Item\ItemFactory;
use App\Service\Item\CategoryService;
use App\Service\Item\ItemService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'custom:importItems',
    description: 'One time command for import the items',
)]
class ImportItemsCommand extends Command
{
    public function __construct(
        private readonly ItemService $itemService,
        private readonly CategoryService $categoryService,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $itemCount = 0;

        $categories = $this->categoryService->findAll();

        $productsJson = file_get_contents('public/data/products.json');
        $decodedProducts = json_decode($productsJson, true, 512, JSON_THROW_ON_ERROR);
        $totalCount = count($decodedProducts);

        foreach ($decodedProducts as $product)
        {
            $category = $this->matchCategory($categories, $product);
            $price =  rtrim($product['price'],'€');
            $price = str_replace('ab ', '', $price);
            $item = ItemFactory::createItem(
                $product['title'],
                (float) $price,
                $product['description'] ?? null,
                $product['image'] ?? null,
                $product['datasheet'] ?? null,
                $category,
                $product['newArticle'] ?? false,
                $product['topArticle'] ?? false,
            );

            $this->itemService->save($item, true);
            $itemCount++;
        }

        $io->success($itemCount . '/' . $totalCount . ' items are imported');

        return Command::SUCCESS;
    }

    /**
     * @param Category[] $categories
     * @param array $product
     * @return Category|null
     */
    private function matchCategory(array $categories, array $product): ?Category
    {
        foreach ($categories as $category) {
            if ($category->getTitle() === $product['category']) {
                return $category;
            }
        }

        return null;
    }
}
