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
        $month = $date[1] % 2;
        if($date[0] < 23) {
            $year = $date[2] % $this->yearDiff;
            if($month && $date[0] < $this->monthOdd+1 || !$month && $date[0] < $this->monthEven + 1) {
                if (!$year && $date[0] > $this->monthOdd - 1 && $date[1] == $this->inYearMonth) {
                    throw new Exception('Дата не действительна. Высокосный год в последнем месяце имеет не более'.($this->monthOdd - 1).' дн.');
                } else {
                    $this->date = $date;
                    $this->month = $date[1];
                    $this->day = $date[0];
                    $this->year = $date[2];
                }
            } else {
                throw new Exception('Дата не действительна. В месяце не более '. ($month ? $this->monthOdd : $this->monthEven) .' дн.');
            }
        } else {
            throw new Exception('Дата не действительна. В месяце не более '. ($month ? $this->monthOdd : $this->monthEven) .' дн.');
        }

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
        } elseif($number_array > 6) {
            return $this->days[$number_array - 7];
        } else {
            return $this->days[$number_array];
        }

    }

}