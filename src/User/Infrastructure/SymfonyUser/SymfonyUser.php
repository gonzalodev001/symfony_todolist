<?php


namespace App\User\Infrastructure\SymfonyUser;


use App\Todo\Infrastructure\Symfony\Entity\SymfonyTodo;
use App\User\Domain\User;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Password;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method string getUserIdentifier()
 */
class SymfonyUser extends User implements UserInterface, PasswordAuthenticatedUserInterface
{

    private string $hashedPassword;
    private string $symfonyEmail;
    private Collection $todos;

    public function __construct(string $id, string $name, string $symfonyEmail, string $hashedPassword)
    {
        $email = new Email($symfonyEmail);
        $password = new Password($hashedPassword);
        $this->id = $id;
        $this->name = $name;
        $this->symfonyEmail = $symfonyEmail;
        $this->hashedPassword = $hashedPassword;
        $this->todos = new ArrayCollection();
        parent::__construct($id, $name, $email, $password);
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getTodos(): ArrayCollection|Collection
    {
        return $this->todos;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSymfonyEmail(): string
    {
        return $this->symfonyEmail;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->symfonyEmail;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setPassword(string $hashedPassword): void
    {
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @param string $role
     * @return array
     */
    public function addRole(string $role): array
    {
        return parent::addRole($role);
    }

    public function addTodo(SymfonyTodo $todo): void
    {
        $this->todos->add($todo);
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials(): void
    {
    }

    public function getUsername(): string
    {
        return $this->symfonyEmail;
    }

    public function __call(string $name, array $arguments)
    {
    }

}