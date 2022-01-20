<?php


namespace App\User\Domain\Repository;


use App\User\Domain\User;

interface UserRepository
{

    public function create(User $user): void;
    public function getAll(): array;
    public function addRole(string $id, string $role): void;
}