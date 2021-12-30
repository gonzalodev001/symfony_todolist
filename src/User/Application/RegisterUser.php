<?php


namespace App\User\Application;


use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\User;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Password;

class RegisterUser
{

    public function __construct(private UserRepository $userRepository)
    {

    }

    public function __invoke(string $id, string $name, string $email, string $password, string $confirmpassword)
    {
        $email = new Email($email);
        $password = new Password($password);
        $confirmPassword = new Password($confirmpassword);
        $user = User::registerUser($id, $name, $email, $password, $confirmPassword);
        $this->userRepository->create($user);
    }
}