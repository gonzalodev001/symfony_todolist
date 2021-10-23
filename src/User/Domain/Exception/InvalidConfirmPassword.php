<?php


namespace App\User\Domain\Exception;


use App\Shared\Domain\DomainError;

class InvalidConfirmPassword extends DomainError
{

    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_confirm_password';
    }

    public function errorMessage(): string
    {
        return sprintf('The passwords provided do not match');
    }
}