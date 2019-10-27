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
        $this->testClass->setBase($this->testData);
        $this->assertStringContainsString($expected_string, $this->testClass->getBase());
    }
}
