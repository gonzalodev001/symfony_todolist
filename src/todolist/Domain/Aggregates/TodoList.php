<?php


namespace App\todolist\Domain\Aggregates;


class TodoList
{

    private string $id;
    private string $title;
    private string $details;
    private string $date;
    private string $state;
    private string $userId;

    /**
     * TodoList constructor.
     * @param string $id
     * @param string $title
     * @param string $details
     * @param string $date
     * @param string $state
     * @param string $userId
     */
    public function __construct(string $id, string $title, string $details, string $date, string $state, string $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->details = $details;
        $this->date = $date;
        $this->state = $state;
        $this->userId = $userId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function details(): string
    {
        return $this->details;
    }

    public function date(): string
    {
        return $this->date;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public static function registerTodoList(string $id, string $title, string $details, string $date, string $state, string $userId): self
    {

        return new self($id, $title, $details, $date,  $state, $userId);

    }
}