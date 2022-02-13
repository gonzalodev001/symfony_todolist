<?php


namespace App\TodoList\Application;


use App\Todolist\Domain\Aggregates\Todo;
use App\TodoList\Domain\Repository\TodoListRepository;

class RegisterTodo
{

    public function __construct(private TodoListRepository $repository)
    {
    }

    public function __invoke(string $id, string $title, string $details, string $date, string $state, string $userId)
    {
        $todo = Todo::registerTodoList($id,$title,$details,$date,$state,$userId);
        $this->repository->create($todo);
    }
}