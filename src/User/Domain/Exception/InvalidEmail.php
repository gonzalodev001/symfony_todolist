<?php


namespace App\User\Domain\Exception;


use App\Shared\Domain\DomainError;

class InvalidEmail extends DomainError
{
    public function __construct(private string $email)
    {
    }

    public function errorCode(): string
    {
        return 'invalid_email';
    }

    public function errorMessage(): string
    {
        return sprintf('The email provided is invalid');
    }
}