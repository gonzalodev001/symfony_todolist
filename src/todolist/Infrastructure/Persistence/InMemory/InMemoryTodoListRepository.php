<?php


namespace App\todolist\Infrastructure\Persistence\InMemory;


use App\todolist\Domain\Aggregates\TodoList;

class InMemoryTodoListRepository
{
    private array $list = [];

    public function __construct()
    {
    }

    public function addTodoList(TodoList $todoList, int $i): void
    {
        $this->list[$i] = $todoList;
    }

    public function All(): array
    {
        return $this->list;
    }

}