<?php


namespace App\User\Domain\Exception;


use App\Shared\Domain\DomainError;

class InvalidPassword extends DomainError
{

    public function __construct(private string $password)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_password';
    }

    public function errorMessage(): string
    {
        return sprintf('The password provided is invalid. It should contain one capital letter, one number and least 8 characters ');
    }
}