<?php

declare(strict_types = 1);

namespace Hexa\Users\Application\SearchAll;

use function \Lambdish\Phunctional\map;
use Hexa\Users\Domain\UserRepository;
use Hexa\Users\Application\{ UserResponse, UsersResponse };

final class AllUsersSearcher
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): UsersResponse
    {
        return new UsersResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static function ($user) {
            return new UserResponse($user['id'], $user['firstname'], $user['lastname'], $user['email']);
        };
    }
}
