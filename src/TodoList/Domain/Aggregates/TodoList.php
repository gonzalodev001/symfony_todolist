<?php


namespace App\todolist\Domain\Aggregates;


use App\Shared\Domain\Exceptions\EmptyValue;
use App\Shared\Domain\Validators\ValidateDate;
use App\todolist\Domain\Exceptions\InvalidDate;
use App\TodoList\Domain\Exceptions\MinorDate;

class TodoList
{

    private string $id;
    private string $title;
    private string $details;
    private string $date;
    private string $state;
    private string $userId;


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
        self::validateEmptyValue($title,'title');
        self::validateEmptyValue($date, 'date');
        self::validateEmptyValue($details, 'details');
        self::validateEmptyValue($state, 'state');
        self::validateEmptyValue($id, 'id');
        self::validateEmptyValue($userId, 'userId');
        self::validateDate($date);
        return new self($id, $title, $details, $date,  $state, $userId);
    }

    public static function validateEmptyValue(string $value, string $type): void
    {
        if(empty($value)) {
            throw new EmptyValue($type);
        }
    }

    public static function validateDate(string $date): void
    {
        if(!ValidateDate::isValidDate($date)) {
            throw new InvalidDate();
        }
    }

    public function validateMinorDate(string $date): void
    {
        $currentDate = strtotime(date("Y-m-d H:i:s", time()));
        $intoDate = strtotime($date);

        if($currentDate > $intoDate) {
            throw new MinorDate();
        }
    }
}
