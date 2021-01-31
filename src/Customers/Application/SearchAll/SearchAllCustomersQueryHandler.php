<?php

declare(strict_types = 1);

namespace Hexa\Customers\Application\SearchAll;

use Hexa\Shared\Domain\Bus\Query\QueryHandler;
use Hexa\Customers\Application\CustomersResponse;

final class SearchAllCustomersQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(AllCustomersSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllCustomersQuery $query): CustomersResponse
    {
        return $this->searcher->searchAll();
    }
}
