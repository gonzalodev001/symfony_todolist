<?php


namespace App\User\Application;


use App\User\Domain\Repository\UserRepository;

class AddRoleToUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $id, string $role): void
    {
        $this->repository->addRole($id, $role);
    }

}