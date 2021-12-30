<?php


namespace App\Shared\Domain\Validators;


class ValidateDate
{

    public function __construct(private string $date)
    {
    }

    public function date(): string
    {
        return $this->date;
    }

    public static function isValidDate(string $date): bool
    {
        $dates = explode('/', $date);

        if(!count($dates) == 3) return false;

        if(checkdate($dates[1],$dates[0],$dates[2])) {
            return true;
        }
        return false;
    }
}