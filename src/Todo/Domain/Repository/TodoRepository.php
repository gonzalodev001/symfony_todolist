<?php


namespace App\Todo\Domain\Repository;


use App\Todo\Domain\Aggregates\Todo;

interface TodoRepository
{
    public function create(Todo $todo): void;
}
