<?php

namespace CLI\App\Controller;

require_once './app/model/Saving.php';
require_once './app/controller/OperationController.php';

use CLI\App\Controller\OperationController;
use CLI\App\Model\Saving;

class SavingsController
{
    private $saving;
    private $operationController;


    public function __construct()
    {
        $this->saving = new Saving();
        $this->operationController = new OperationController($this->saving, "Savings");
    }
    public function viewSaving()
    {
        $this->operationController->view();
    }

    public function addSaving()
    {
        $this->operationController->add();
    }
}
