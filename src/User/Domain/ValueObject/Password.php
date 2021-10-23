<?php


namespace App\User\Domain\ValueObject;


use App\User\Domain\Exception\InvalidPassword;

class Password
{
    const pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    public function __construct(private string $pass)
    {
        self::validatePassword($pass);
    }

    public function password(): string
    {
        return $this->pass;
    }

    public static function validatePassword(string $pass): void
    {
        if (!preg_match(self::pattern, $pass)) {
            throw new InvalidPassword($pass);
        }
    }
}