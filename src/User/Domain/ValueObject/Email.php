<?php


namespace App\User\Domain\ValueObject;


use App\User\Domain\Exception\InvalidEmail;

class Email
{

    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function ensureIsValue(string $value): void
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmail($value);
        }
    }
}