<?php

declare(strict_types=1);

namespace App\Model\Common;

class ModelList
{
    private array $list;

    private RequestMetaData $requestMetaData;

    public function __construct(array $list, RequestMetaData $requestMetaData)
    {
        $this->list = $list;
        $this->requestMetaData = $requestMetaData;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function setList(array $list): self
    {
        $this->list = $list;

        return $this;
    }

    public function addToList(object $item): void
    {
        $this->list[] = $item;
    }

    public function getRequestMetaData(): RequestMetaData
    {
        return $this->requestMetaData;
    }

    public function setRequestMetaData(RequestMetaData $requestMetaData): self
    {
        $this->requestMetaData = $requestMetaData;

        return $this;
    }
}
