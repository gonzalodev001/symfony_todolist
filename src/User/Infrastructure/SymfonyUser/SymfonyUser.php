<?php


namespace App\User\Infrastructure\SymfonyUser;


use App\User\Domain\User;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Password;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method string getUserIdentifier()
 */
class SymfonyUser extends User implements UserInterface, PasswordAuthenticatedUserInterface
{

    private string $hashedPassword;
    private string $symfonyEmail;
    private array $roles;

    public function __construct(string $id, string $name, string $symfonyEmail, string $hashedPassword)
    {
        $email = new Email($symfonyEmail);
        $password = new Password($hashedPassword);
        $this->id = $id;
        $this->name = $name;
        $this->symfonyEmail = $symfonyEmail;
        $this->hashedPassword = $hashedPassword;
        $this->roles[] = 'ROLE_USER';
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
    public function addRole(string $role): void
    {
        $this->roles[] = 'ROLE'. filter_var($role, FILTER_SANITIZE_STRING);
        $this->setRoles($this->roles);
        //return $this->roles;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

}