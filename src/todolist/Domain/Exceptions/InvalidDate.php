<?php


namespace App\todolist\Domain\Exceptions;


use App\Shared\Domain\DomainError;

class InvalidDate extends DomainError
{

    public function errorCode(): string
    {
        return 'empty_date';
    }

    public function errorMessage(): string
    {
        return sprintf('The date provided is empty');
    }
}