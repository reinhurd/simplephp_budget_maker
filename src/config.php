<?php
global $config_budget;
$config_budget['HEADER_STRUCTURE_DEFAULT'] = array(
    'CURRENT_DATE' => null,
    'INCOME_ON_DATE' => 0,
    'TOTAL_EXPENSE_ON_DATE' => 0,
    'MONEY_HAVE_TOTAL_ON_DATE' => 0,
    'MONEY_DEBT_TOTAL_ON_DATE' => 0 //debt counts on credit card and dont included in previous sum
);


$config_budget['CHANGE_STRUCTURE_DEFAULT'] = array(
    'SUM' => 0,
    'IS_INCOME_OR_EXPENSE' => '',
    'DATE' => null,
    'PERIODIC' => null //yes or no, if periodic, counts as many times, as days after defined
);
