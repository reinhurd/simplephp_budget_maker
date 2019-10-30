<?php
use function \cli\prompt;
use function \cli\line;

class ConsoleWorker
{
    public $available_command = array(
        "show_today" => "showTodayBudget",
        "show_all" => "showAllDatesOnBudget"
    );
    public $command = '';
    public $filename = '';

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

    public function showAllDatesOnBudget()
    {
        $start_date = prompt('Enter start date (format - d-m-Y, ex 21-10-2019):');
        $start_budget = (int)prompt('Enter start budget:');
        $income = prompt('Enter all regular income (on day), divided by comma:');
        $income = explode(',' , $income);
        $expense = prompt('Enter all regular expense (on day), divided by comma:');
        $expense = explode(',', $expense);
        $date_today = DateWorker::getTodaydate();
        $budget = new MainFullfillWorker($start_date, $date_today, $start_budget, $income, $expense);
        $result = $budget->setTableFromRow();
        $storage = new BudgetStorage();
        $this->filename = $storage->saverFromTable($result);
        return "Your file $this->filename is create. Thank you!";
    }

    public function showMessage($mess)
    {
        echo $mess;
    }

    public function checkAndRunCommand()
    {
        if (array_key_exists($this->command, $this->available_command)) {
            $command = $this->available_command[$this->command];
            $output = $this->{$command}();
            $this->showMessage($output);
        } else {
            $this->showMessage("Please, enter correct command");
        }
    }
}
