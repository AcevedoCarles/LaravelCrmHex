<?php

declare(strict_types = 1);

namespace Hexa\Tasks\Application;

use Hexa\Shared\Domain\Bus\Query\Response;

final class TaskResponse implements Response
{
    public function __construct(int $id, string $name, string $subject, string $description, string $date, int $creator_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->subject = $subject;
        $this->description = $description;
        $this->date = $date;
        $this->creator_id = $creator_id;
    }
}

