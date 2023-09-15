<?php 


namespace CLI\App\Model;
require_once './app/model/Model.php';

use CLI\App\Model\Model;

class Saving extends Model{

    private $fileName = "saving.txt";


    public function __construct()
    {
        parent::__construct($this->fileName);
    }

}