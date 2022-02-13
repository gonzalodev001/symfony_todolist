<?php


namespace App\TodoList\Infrastructure\Symfony\Entity;


use App\User\Infrastructure\SymfonyUser\SymfonyUser;

class SymfonyTodo
{
    private string $id;
    private string $title;
    private string $details;
    private string $date;
    private string $state;
    private $user;

    /**
     * SymfonyTodo constructor.
     * @param string $id
     * @param string $title
     * @param string $details
     * @param string $date
     * @param string $state
     */
    public function __construct(string $id, string $title, string $details, string $date, string $state)
    {
        $this->id = $id;
        $this->title = $title;
        $this->details = $details;
        $this->date = $date;
        $this->state = $state;
    }

    public function getUser(): ?SymfonyUser
    {
        return $this->user;
    }

    public function setUser(?SymfonyUser $user): self
    {
        $this->user = $user;
        return $this;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @param string $details
     */
    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }





}