<?php


use PHPUnit\Framework\TestCase;

class MainFullfillWorkerTest extends TestCase
{
    public $test_class;
    public function setUp(): void
    {
        $this->test_class = new MainFullfillWorker('01-10-2019', date('d-m-Y'), 10000, array(10), array(20));
    }

//    public function testSetRow()
//    {
//
//    }

    public function testSetTableFromRows()
    {
        $result = $this->test_class->setTableFromRow();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testBasicMath()
    {
        $testclass = new MainFullfillWorker('01-10-2019', '20-10-2019', 10000, array(10), array(1));
        $days = 19;
        $expected_budget = 10171; // 10000 + 19 * 9
        $result = $testclass->setTableFromRow();
        $this->assertSame($expected_budget, end($result)["MONEY_HAVE_TOTAL_ON_DATE"]);
    }

}
