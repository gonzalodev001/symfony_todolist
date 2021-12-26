<?php


namespace App\User\Domain;


use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Exception\InvalidConfirmPassword;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Password;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service_locator;

class User
{
    private Uuid $id;
    private string $name;
    private Email $email;
    private Password $password;

    public function __construct(Uuid $id, string $name, Email $email, Password $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): Email
    {
        return $this->email;
    }
    public function password(): Password
    {
        return $this->password;
    }

    public static function registerUser(Uuid $id, string $name, Email $email, Password $password, Password $confirmPassword): User
    {
        self::validatePasswords($password, $confirmPassword);
        return new self ($id, $name, $email, $password);
    }

    public static function validatePasswords(Password $password, Password $confirmPassword): void
    {
        if($password->password() !== $confirmPassword->password()) {
            throw new InvalidConfirmPassword();
        }
    }

}