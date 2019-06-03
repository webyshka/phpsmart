<?php
class Calendar {
    public $inYearMonth = 13;
    public $monthEven = 21;
    public $monthOdd = 22;
    public $days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    public $firstDayInStart = 1;
    public $startYear = 1990;
    public $yearDiff = 5;
    public $isVis = true;
    public $date, $month, $day, $year, $dayInYear ;

    public function __construct() {
        $this->dayInYear = $this->countDayMonth($this->inYearMonth);
    }

    public function init($date) {
        $date = explode('.',$date);
        $this->date = $date;
        $this->month = $date[1];
        $this->day = $date[0];
        $this->year = $date[2];
    }

    public function countDayMonth($month) {
        return (int)round($month * ($this->monthEven + $this->monthOdd) / 2);
    }

    public function countVis() {
        return (int)((($this->year - 1) - $this->startYear)/ $this->yearDiff) + $this->isVis;
    }
    public function findDate() {
        $countDays = $this->countDayMonth($this->month - 1) + ($this->year - $this->startYear) * $this->dayInYear  - $this->countVis() + $this->day;
        $number_array = ($countDays % 7) - 1 + $this->firstDayInStart; // для смещения в массиве и в зависимости от первого дня в 1990 году
        if($number_array < 0) {
            return $this->days[6];
        } else {
            return $this->days[$countDays % 7];
        }

    }

}