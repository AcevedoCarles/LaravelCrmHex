<?php

declare(strict_types = 1);

namespace Hexa\Ambits\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\Ambits\Domain\AmbitRepository;
use Hexa\Ambits\Application\{ AmbitResponse, AmbitsResponse };

final class AllAmbitsSearcher
{
    private $repository;

    public function __construct(AmbitRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): AmbitsResponse
    {
        return new AmbitsResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($ambit) {
            return new AmbitResponse($ambit['id'], $ambit['unit_id'], $ambit['name'], $ambit['description']);
        };
    }
}
