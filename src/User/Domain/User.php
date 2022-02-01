<?php


namespace App\User\Domain;


use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Exception\InvalidConfirmPassword;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Password;


class User
{
    protected string $id;
    protected string $name;
    protected Email $email;
    protected Password $password;
    protected \DateTime $createdAt;
    protected \DateTime $updatedAt;
    protected array $roles;

    public function __construct(string $id, string $name, Email $email, Password $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTime();
        $this->roles[] = 'ROLE_USER';
        $this->markAsUpdated();
    }

    public function id(): string
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

    public function roles(): array
    {
        return $this->roles;
    }

    protected function addRole(string $role): array
    {
        $this->roles[] = 'ROLE_'.filter_var($role, FILTER_SANITIZE_STRING);
        return $this->roles();
    }

    public static function registerUser(string $id, string $name, Email $email, Password $password, Password $confirmPassword): User
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

    public function markAsUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }

}