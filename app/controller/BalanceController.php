<?php 

namespace CLI\App\Controller;

require_once './app/model/Expense.php';
require_once './app/model/Income.php';
require_once './app/model/Saving.php';

use CLI\App\Model\Expense;
use CLI\App\Model\Income;
use CLI\App\Model\Saving;


class BalanceController{

    private $income;
    private $expense;
    private $saving;

    public function __construct()
    {
        $this->income = new Income();
        $this->expense = new Expense();
        $this->saving = new Saving();
    }

    public function getTotalAmount($model){
       
        $allData = $model->all();
        $allData = json_decode($allData, true);
        $totalAmount = 0;

        foreach($allData as $item){
            foreach($item as $itemId => $itemDetails){
                $totalAmount += $itemDetails['amount'];    
            }
        }
        return $totalAmount;

    }

    public function viewBalance(){
        $totalSavings = $this->getTotalAmount($this->saving);
        $totalExpense = $this->getTotalAmount($this->expense);
        $totalIncome = $this->getTotalAmount($this->income);

        $totalBalance = ($totalSavings + $totalIncome) - $totalExpense;

        $incomeHeading = str_pad("Net Income", 20, " ", STR_PAD_RIGHT);
        $savingHeading = str_pad("Net Saving", 20, " ", STR_PAD_RIGHT);
        $expenseHeading = str_pad("Net Expense", 20, " ", STR_PAD_RIGHT);
        $balanceHeading = str_pad("Net Balance", 20, " ", STR_PAD_RIGHT);

        $incomeData = str_pad($totalIncome , 20, " ", STR_PAD_RIGHT);
        $savingData = str_pad($totalSavings , 20, " ", STR_PAD_RIGHT);
        $expenseData = str_pad($totalExpense , 20, " ", STR_PAD_RIGHT);
        $balanceData = str_pad($totalBalance , 20, " ", STR_PAD_RIGHT);

        echo $incomeHeading . $savingHeading . $expenseHeading . $balanceHeading . "\n";
        echo $incomeData . $savingData . $expenseData . $balanceData . "\n";
        echo "====================================================================\n";
    }
}