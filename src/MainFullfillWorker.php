<?php

class MainFullfillWorker
{
    public $date_begin;
    public $date_end;
    public $sum_begin;
    public $all_incomed = array();
    public $all_expense = array();
    public $config;

    public function __construct($date_begin, $date_end, $sum_begin, $all_incomed, $all_expense)
    {
        global $config_budget;
        $this->date_begin = $date_begin;
        $this->date_end = $date_end;
        $this->sum_begin = $sum_begin;
        $this->all_incomed = $all_incomed;
        $this->all_expense = $all_expense;
        $this->config = $config_budget;
    }

    public function setRow($date)
    {
        //ToDo need include MathWorker
    }

    public function setTableFromRow()
    {
        $array_dates = DateWorker::getArrayOfDays($this->date_begin, $this->date_end);
        $returned_table = array();
        foreach ($array_dates as $key=>$date) {
            //ToDo $returned_table[] = $this->setRow($date);
            $row = $this->config['HEADER_STRUCTURE_DEFAULT'];
            $row['CURRENT_DATE'] = $date;

            if (!empty($this->all_incomed)) {
                foreach ($this->all_incomed as $income) {
                    $row['INCOME_ON_DATE'] += $income;
                }
            } else {
                $row['INCOME_ON_DATE'] += 0;
            }

            if (!empty($this->all_expense)) {
                foreach ($this->all_expense as $expense) {
                    $row['TOTAL_EXPENSE_ON_DATE'] += $expense;
                }
            } else {
                $row['TOTAL_EXPENSE_ON_DATE'] += 0;
            }

            if ($key == 0) {
                $row["MONEY_HAVE_TOTAL_ON_DATE"] = $this->sum_begin;
            } else {
                $row["MONEY_HAVE_TOTAL_ON_DATE"] = $returned_table[$key-1]["MONEY_HAVE_TOTAL_ON_DATE"] + $returned_table[$key-1]["INCOME_ON_DATE"] - $returned_table[$key-1]["TOTAL_EXPENSE_ON_DATE"];
            }
            $returned_table[] = $row;
        }
        return $returned_table;
    }
}
