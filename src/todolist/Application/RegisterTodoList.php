<?php


namespace App\todolist\Application;


use App\todolist\Domain\Aggregates\TodoList;
use App\todolist\Domain\Repository\TodoListRepository;

class RegisterTodoList
{

    public function __construct(private TodoListRepository $repository)
    {
    }

    public function __invoke(string $id, string $title, string $details, string $date, string $state, string $userId)
    {
        $todolist = TodoList::registerTodoList($id,$title,$details,$date,$state,$userId);
        $this->repository->create($todolist);
    }
}