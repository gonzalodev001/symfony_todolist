<?php


namespace App\todolist\Domain\Repository;


use App\todolist\Domain\Aggregates\TodoList;

interface TodoListRepository
{

    public function create(TodoList $todoList): void;
}