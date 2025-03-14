<?php
declare(strict_types=1);

namespace App\Database\Trait;

trait PrimaryKey
{
    public function __construct(
        readonly private int $id,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }
}
