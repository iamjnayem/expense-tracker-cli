<?php

namespace CLI\App\Controller;

require_once './app/model/Expense.php';
require_once './app/controller/OperationController.php';

use CLI\App\Model\Expense;
use CLI\App\Controller\OperationController;


class ExpenseController
{
    private $expense;
    private $operationController;

   
    public function __construct()
    {
        $this->expense = new Expense();
        $this->operationController = new OperationController($this->expense, "Expense");
    }
    public function viewExpense()
    {
        $this->operationController->view();
    }

    public function addExpense()
    {
        $this->operationController->add();
    }
}
