<?php 

namespace CLI\App\Model;

require_once './app/model/Model.php';

use CLI\App\Model\Model;

class Expense extends Model{

    private $fileName = "expense.txt";


    public function __construct()
    {
        parent::__construct($this->fileName);
    }

}