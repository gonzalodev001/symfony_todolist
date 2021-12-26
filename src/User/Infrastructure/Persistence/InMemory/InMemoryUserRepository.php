<?php


namespace App\User\Infrastructure\Persistence\InMemory;


use App\User\Domain\Repository\UserRepository;
use App\User\Domain\User;

class InMemoryUserRepository implements UserRepository
{

    private array $users = [];

    public function __construct(public int $i = 0)
    {
    }

    public function create(User $user): void
    {
        $this->users[$this->i++] = $user;
        var_dump($this->i);
        var_dump($this->users);
    }

    public function getAll(): array
    {
        return $this->users;
    }
}