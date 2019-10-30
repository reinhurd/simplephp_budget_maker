<?php
use League\Csv\Writer;
use League\Csv\Reader;

class BudgetStorage
{
    public $config;
    public $filename = __DIR__ . "/../database.csv";

    public function __construct()
    {
        global $config_budget;
        $this->config = $config_budget;
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
        return realpath($this->filename);
    }

    public function saverFromTable($data) {
        $csv = Writer::createFromString('');
        $csv->insertOne(array_keys($this->config['HEADER_STRUCTURE_DEFAULT']));
        $csv->insertAll($data);
        $data = $csv->getContent();
        return $this->setBase($data);
    }
}
