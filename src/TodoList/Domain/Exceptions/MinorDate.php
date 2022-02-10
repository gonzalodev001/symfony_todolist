<?php


namespace App\TodoList\Domain\Exceptions;


use App\Shared\Domain\DomainError;

class MinorDate extends DomainError
{

    public function errorCode(): string
    {
        return 'minor_date';
    }

    public function errorMessage(): string
    {
        return sprintf('The date provided is minor than current date');
    }
}