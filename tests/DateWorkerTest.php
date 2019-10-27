<?php
use PHPUnit\Framework\TestCase;

class DateWorkerTest extends TestCase
{

    public function testGetTodaydate()
    {
        $return_date = DateWorker::getTodaydate();
        $expected_date = date('d m Y');
        $this->assertSame($expected_date, $return_date);
    }
}
