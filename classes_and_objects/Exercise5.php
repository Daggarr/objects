<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function DisplayDate(): string
    {
        return "{$this->month}/{$this->day}/{$this->year}";
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setMonth(int $newMonth): void
    {
        $this->month = $newMonth;
    }

    public function setDay(int $newDay): void
    {
        $this->day = $newDay;
    }

    public function setYear(int $newYear):void
    {
        $this->year = $newYear;
    }
}

$date = new Date(9, 7, 2021);

echo $date->DisplayDate().PHP_EOL;

$date->setYear(2050);
$date->setDay(15);

echo $date->DisplayDate().PHP_EOL;