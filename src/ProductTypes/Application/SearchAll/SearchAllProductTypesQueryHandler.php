<?php

declare(strict_types = 1);

namespace Hexa\ProductTypes\Application\SearchAll;

use Hexa\Shared\Domain\Bus\Query\QueryHandler;
use Hexa\ProductTypes\Application\ProductTypesResponse;

final class SearchAllProductTypesQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(AllProductTypesSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllProductTypesQuery $query): ProductTypesResponse
    {
        return $this->searcher->searchAll();
    }
}
