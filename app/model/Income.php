<?php 


namespace CLI\App\Model;
require_once './app/model/Model.php';

use CLI\App\Model\Model;

class Income extends Model{

    private $fileName = "income.txt";


    public function __construct()
    {
        parent::__construct($this->fileName);
    }
}