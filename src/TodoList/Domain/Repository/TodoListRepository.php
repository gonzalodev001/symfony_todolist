<?php


namespace App\TodoList\Domain\Repository;


use App\TodoList\Domain\Aggregates\Todo;

interface TodoListRepository
{

    public function create(Todo $todoList): void;
}