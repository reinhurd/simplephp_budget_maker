<?php

class ConsoleWorker
{
    public $available_command = array(
        "show_today" => "showTodayBudget"
    );
    public $command = '';
    public function __construct()
    {
        global $argv;
        $command = $argv[1];
        $this->command = $command;
    }

    public function showTodayBudget()
    {
        $date = DateWorker::getTodaydate();
        return "Hello! Your budget for $date is";
    }

    public function checkAndRunCommand()
    {
        if (array_key_exists($this->command, $this->available_command)) {
            $command = $this->available_command[$this->command];
            $output = $this->{$command}();
        }
        echo $output;
    }
}
