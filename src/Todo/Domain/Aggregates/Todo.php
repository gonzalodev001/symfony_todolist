<?php


namespace App\Todo\Domain\Aggregates;


use App\Shared\Domain\Exceptions\EmptyValue;
use App\Shared\Domain\Validators\ValidateDate;
use App\Todo\Domain\Exceptions\InvalidDate;
use App\Todo\Domain\Exceptions\MinorDate;

class Todo
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
        self::validateTime($date);
        self::validateMinorDate($date);

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

    public static function validateMinorDate(string $date): void
    {
        $currentDate = strtotime(date("Y-m-d H:i:s", time()));
        $intoDate = strtotime($date);

        if($currentDate > $intoDate) {
            throw new MinorDate();
        }
    }

    public static function validateTime(string $time): void
    {
        if(!ValidateDate::isValidTime($time)) {
            throw new InvalidDate();
        }
    }

}