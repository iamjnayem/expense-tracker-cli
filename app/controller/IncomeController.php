<?php

namespace CLI\App\Controller;

require_once './app/model/Income.php';
require_once './app/controller/OperationController.php';


use CLI\App\Model\Income;
use CLI\App\Controller\OperationController;

class IncomeController
{
    private $income;
    private $operationController;


    public function __construct()
    {
        $this->income = new Income();
        $this->operationController = new OperationController($this->income, "Income");
    }
    public function viewIncome()
    {
        $this->operationController->view();
    }

    public function addIncome()
    {
        $this->operationController->add();
    }
}
