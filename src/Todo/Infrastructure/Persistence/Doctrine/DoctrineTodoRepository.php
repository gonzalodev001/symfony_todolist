<?php


namespace App\Todo\Infrastructure\Persistence\Doctrine;


use App\Todo\Domain\Aggregates\Todo;
use App\Todo\Domain\Repository\TodoRepository;
use App\Todo\Infrastructure\Symfony\Entity\SymfonyTodo;
use App\User\Infrastructure\SymfonyUser\SymfonyUser;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineTodoRepository implements TodoRepository
{

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create(Todo $todoList): void
    {
        /** @var SymfonyUser $user */
        $user = $this->entityManager->find(SymfonyUser::class, $todoList->userId());
        $datetime = new \DateTime($todoList->date());

        $todo = new SymfonyTodo(
            $todoList->id(),
            $todoList->title(),
            $todoList->details(),
            $datetime,
            $todoList->state()
        );

        $todo->setUser($user);
        $this->entityManager->persist($todo);
        $this->entityManager->flush();

    }
}