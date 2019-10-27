<?php
use function \cli\prompt;

class ConsoleWorker
{
    public $available_command = array(
        "show_today" => "showTodayBudget"
    );
    public $command = '';
    public function __construct()
    {
          echo("Hello!\n");
    }

    public function getStartQuestion()
    {
        $command = prompt('What do you want? Example - show_today - for show today budget state');
        $this->command = $command;
    }

    public function showTodayBudget()
    {
        $date = DateWorker::getTodaydate();
        return "Your budget for $date is";
    }

    public function checkAndRunCommand()
    {
        if (array_key_exists($this->command, $this->available_command)) {
            $command = $this->available_command[$this->command];
            $output = $this->{$command}();
        } else {
            $output = "Please, enter correct command";
        }
        return $output;
    }
}
