<?php

declare(strict_types=1);

namespace App\Controller\Item;

use App\Controller\Common\RequestMetaDataTrait;
use App\Entity\Item\Item;
use App\Service\Item\ItemService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExternalItemController extends AbstractController
{
    use RequestMetaDataTrait;

    public function __construct(
        private readonly ItemService $itemService,
    ) {
    }

    #[Route('/items', name: 'app_external_item')]
    public function getItems(Request $request): JsonResponse
    {
        $metaData = $this->getRequestMetaData($request);
        $itemsList = $this->itemService->getItems($metaData);
        $items = [];

        /**
         * @var $item Item
         */
        foreach ($itemsList->getList() as $item) {
            $items[] = $item->serialize();
        }

        return new JsonResponse($items, JsonResponse::HTTP_OK);
    }

    #[Route('/items/{id}', name: 'app_external_item')]
    public function getItem(int $id): JsonResponse
    {
        $item = $this->itemService->getItemById($id);
    }
}
