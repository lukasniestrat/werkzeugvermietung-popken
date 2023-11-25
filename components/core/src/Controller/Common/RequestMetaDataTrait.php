<?php

declare(strict_types=1);

namespace App\Controller\Common;

use App\Model\Common\RequestMetaData;
use Symfony\Component\HttpFoundation\Request;

trait RequestMetaDataTrait
{
    protected const STANDARD_LIMIT = 10;

    protected const STANDARD_OFFSET = 0;

    protected const STANDARD_ORDER_COLUMN = 'id';

    protected const STANDARD_ORDER_SEQUENCE = 'desc';

    public function getRequestMetaData(Request $request): RequestMetaData
    {
        $limit = $request->query->getInt('limit', static::STANDARD_LIMIT);
        $offset = max($request->query->getInt('offset', static::STANDARD_OFFSET), 0);
        $orderBy = (string) $request->query->get('orderBy', static::STANDARD_ORDER_COLUMN);
        $orderSequence = (string) $request->query->get('orderSequence', static::STANDARD_ORDER_SEQUENCE);

        return new RequestMetaData(0, $limit, $offset, $orderBy, $orderSequence, '');
    }
}
