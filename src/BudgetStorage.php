<?php
use League\Csv\Writer;
use League\Csv\Reader;

class BudgetStorage
{
    public $filename = __DIR__ . "/../database.csv";

    public function __construct()
    {
        if (!file_exists($this->filename)) {
            file_put_contents($this->filename, '');
        }
    }

    public function getBase()
    {
        $csv = Reader::createFromPath($this->filename, 'r');
        return $csv->getContent(); //returns the CSV document as a string
    }

    public function setBase($data)
    {
        file_put_contents($this->filename, $data);
    }
}
