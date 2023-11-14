<?php

namespace App;



final class Date
{

    private array $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];

    /**
     * @param int $day
     * @param string $month
     * @param int $year
     * @throws InvalidArgumentException
     */
    public function __construct(private int $day, private string $month, private int $year)
    {


        if ($day <= 0 || $day >= 31) {
            throw new \InvalidArgumentException('Wrong arguments: Day!');
        }
        if (!in_array($month, $this->months, true)) {
            throw new \InvalidArgumentException('Wrong arguments: Month!');
        }
        if ($year <= 0 || $year >= 2999) {
            throw new \InvalidArgumentException('Wrong arguments: Year!');
        }


    }

    /**
     * Returns day of the object
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * Returns month of the object
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * Returns year of the object
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Compares two date objects if its equal
     * @param Date $date
     * @return bool
     */
    public function isEqualTo(Date $date): bool
    {
        return ($this->getDay() === $date->getDay() && $this->getMonth() === $date->getMonth() && $this->getYear() === $date->getYear());
    }

    /**
     * Returns the difference between the dates in a string format
     * @param Date $date
     * @return string
     */
    public function dateDifference(Date $date): string
    {
        $year = abs($this->getYear() - $date->getYear());
        $month = abs(array_search($this->getMonth(), $this->months, true) - array_search($date->getMonth(), $this->months, true));
        $day = abs($this->getDay() - $date->getDay());
        return "Різниця між датами " . $this->format('D-m-Y', '/') . ' та ' . $date->format('D-m-Y', '/') .
            ' ' . $year . " років, " . $month . " місяців та  " . $day . " днів." . PHP_EOL;
    }

    /**
     * Returns formatted string with provided format style like 'd-m-y' and separator like '/' or '-'
     * @param string $format
     * @param string $separator
     * @return string
     */
    public function format(string $format, string $separator): string
    {
        $string = '';
        $formatType = explode('-', $format);

        foreach ($formatType as $type) {
            switch ($type) {
                case 'd':
                    $string .= $this->getDay();
                    break;
                case 'D':
                    if ($this->getDay() >= 10) {
                        $string .= $this->getDay();
                        break;
                    }
                    $string .= 0 . $this->getDay();
                    break;
                case 'M':
                    $string .= $this->getMonth();
                    break;
                case 'm':
                    $month = array_search($this->getMonth(), $this->months, true);
                    if ($month >= 10) {
                        $string .= $month;
                        break;
                    }
                    $string .= 0 . $month;
                    break;
                case 'Y':
                    $string .= substr($this->getYear(), -2);
                    break;
                case 'y':
                    $string .= $this->getYear();
                    break;
            }
            $string .= $separator;

        }
        return substr($string, 0, -1);
    }


}