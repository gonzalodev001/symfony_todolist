<?php


namespace App\Todo\Infrastructure\Symfony\Entity;


use App\User\Infrastructure\SymfonyUser\SymfonyUser;
use DateTime;

class SymfonyTodo
{

    private string $id;
    private string $title;
    private string $details;
    private DateTime $date;
    private string $state;
    private SymfonyUser $user;

    /**
     * SymfonyTodo constructor.
     * @param string $id
     * @param string $title
     * @param string $details
     * @param DateTime $date
     * @param string $state
     */
    public function __construct(string $id, string $title, string $details, DateTime $date, string $state)
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

    public function setUser(SymfonyUser $user): void
    {
        $user->addTodo($this);
        $this->user = $user;
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
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
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