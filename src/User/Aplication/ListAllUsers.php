<?php


namespace App\User\Aplication;


use App\User\Domain\Repository\UserRepository;

class ListAllUsers
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function __invoke(): array
    {
        return $this->userRepository->getAll();
    }

}