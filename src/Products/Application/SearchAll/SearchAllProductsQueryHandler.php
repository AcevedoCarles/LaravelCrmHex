<?php

declare(strict_types = 1);

namespace Hexa\Products\Application\SearchAll;

use Hexa\Shared\Domain\Bus\Query\QueryHandler;
use Hexa\Products\Application\ProductsResponse;

final class SearchAllProductsQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(AllProductsSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllProductsQuery $query): ProductsResponse
    {
        return $this->searcher->searchAll();
    }
}
