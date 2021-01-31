<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application\SearchAll;

use Hexa\Shared\Domain\Bus\Query\QueryHandler;
use Hexa\Tasks\Application\TasksResponse;

final class SearchAllTasksQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(AllTasksSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllTasksQuery $query): TasksResponse
    {
        return $this->searcher->searchAll();
    }
}
