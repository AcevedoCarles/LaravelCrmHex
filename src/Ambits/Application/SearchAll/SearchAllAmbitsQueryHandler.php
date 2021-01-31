<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application\SearchAll;

use Hexa\Shared\Domain\Bus\Query\QueryHandler;
use Hexa\Ambits\Application\AmbitsResponse;

final class SearchAllAmbitsQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(AllAmbitsSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllAmbitsQuery $query): AmbitsResponse
    {
        return $this->searcher->searchAll();
    }
}
