<?php
declare(strict_types=1);

namespace App;

interface EntityManagerInterface
{
    public function find(string $entityName, int $id): object;
}
