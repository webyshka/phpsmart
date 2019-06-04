<?
require_once('class.Calendar.php');

class classUnit extends \PHPUnit\Framework\TestCase{
    private $calendar;

    protected function setUp() {
        $this->calendar = new Calendar();
    }

    protected function tearDown() {
        $this->calendar = NULL;
    }

    public function testAdd() {
        $this->calendar->init('17.11.2013');
        $result = $this->calendar->findDate();
        $this->assertEquals('Среда', $result);
    }

}