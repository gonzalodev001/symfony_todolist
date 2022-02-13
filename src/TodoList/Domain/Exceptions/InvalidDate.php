<?php


namespace App\TodoList\Domain\Exceptions;


use App\Shared\Domain\DomainError;

class InvalidDate extends DomainError
{

    public function errorCode(): string
    {
        return 'invalid_date';
    }

    public function errorMessage(): string
    {
        return sprintf('The date provided is invalid');
    }
}