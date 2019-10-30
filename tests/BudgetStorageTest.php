<?php

use League\Csv\Writer;
use PHPUnit\Framework\TestCase;

class BudgetStorageTest extends TestCase
{
    public $testClass;
    public $testData;

    public function setUp(): void
    {
        $this->testClass = new BudgetStorage();
        $data = [
            [1, 2, 3],
            ['foo', 'bar', 'baz'],
            ['john', 'doe', 'john.doe@example.com'],
        ];
        $csv = Writer::createFromString('');
        $csv->insertAll($data);
        $data = $csv->getContent();
        $this->testData = $data;
    }

    public function test__construct()
    {
        $this->assertFileExists($this->testClass->filename);
    }

    public function testGetBase()
    {
        $this->assertIsString($this->testClass->getBase());
    }

    public function testSetBase()
    {

        $expected_string = 'john.doe@example.com';
        $return_path = $this->testClass->setBase($this->testData);
        $this->assertStringContainsString($expected_string, $this->testClass->getBase());
        $this->assertFileExists($return_path);
    }

    public function testSaverFromTable()
    {
        $test_data = [
            ['10-12-19', 100, 0, 1000, 0],
            ['11-12-19', 100, 0, 1100, 0]
        ];
        $this->testClass->saverFromTable($test_data);
        $file_data = file_get_contents($this->testClass->filename);
        $this->assertStringContainsString('11-12-19', $file_data);
    }
}
