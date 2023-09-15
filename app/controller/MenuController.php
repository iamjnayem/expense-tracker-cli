<?php

namespace CLI\App\Controller;

require_once './app/controller/IncomeController.php';
require_once './app/controller/ExpenseController.php';
require_once './app/controller/SavingsController.php';
require_once './app/controller/BalanceController.php';

use CLI\App\Controller\BalanceController;
use CLI\App\Controller\IncomeController;
use CLI\App\Controller\ExpenseController;
use CLI\App\Controller\SavingsController;


use Exception;

class MenuController
{
    private $input;

    public function staticInputTitle()
    {
        echo "\nPlease choose the option: ";
    }

    public function staticOptions()
    {
        echo "\n=============================\n";
        echo "1. View Income\n";
        echo "2. Add Income\n";
        echo "3. View Expense\n";
        echo "4. Add Expense\n";
        echo "5. View Savings\n";
        echo "6. Add Savings\n";
        echo "7. Balance Enquiry\n";
        echo "8. Go Back\n";
        echo "0. Quit\n";
        echo "\n=============================\n";
    }

    public function showAllMenu()
    {
        try {
            do {
                $this->staticOptions();
                $this->takeInput();
                $this->takeAction();
               
                if ($this->input == "0") {
                    break;
                }

            } while (true);

        } catch (Exception $e) {
            $e->getMessage();
            $e->getFile();
            $e->getLine();
        }

    }
    public function takeInput()
    {
        $this->staticInputTitle();
        $this->input = fgets(STDIN);
        
    }

    public function takeAction()
    {

        switch ($this->input) {
            case 1:
                (new IncomeController())->viewIncome();
                break;
            case 2;
                (new IncomeController())->addIncome();
                break;
            case 3:
                (new ExpenseController())->viewExpense();
                break;
            case 4;
                (new ExpenseController())->addExpense();
                break;
            case 5:
                (new SavingsController())->viewSaving();
                break;
            case 6:
                (new SavingsController())->addSaving();
                break;
            case 7:
                (new BalanceController())->viewBalance();
                break;

            case 8:
                echo "Going Back....";
                echo "\033c";
                break;
            case 0:
                echo "Quitting.....\n\n\n";
                break;
            default: 
                echo "Please choose valid option \n\n";
                break;
        }
    }
}
