<?php

namespace Hexa\Tasks\Application\Create;

use Hexa\Shared\Domain\Bus\Command\Command;

final class CreateTaskCommand implements Command
{
    private $name;
    private $subject;
    private $description;
    private $date;
    private $creator_id;

    public function __construct( string $name, string $subject, string $description, string $date, int $creator_id)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->description = $description;
        $this->date = $date;
        $this->creator_id = $creator_id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function date(): string
    {
        return $this->date;
    }

    public function creator_id(): int
    {
        return $this->creator_id;
    }
}
