<?php


namespace App\Todo\Application;


use App\Todo\Domain\Aggregates\Todo;
use App\Todo\Domain\Repository\TodoRepository;

class RegisterTodo
{

    public function __construct(private TodoRepository $repository)
    {
    }

    public function __invoke(string $id, string $title, string $details, string $date, string $state, string $userId): void
    {
        $todo = Todo::registerTodoList($id,$title,$details,$date,$state,$userId);
        $this->repository->create($todo);
    }
}