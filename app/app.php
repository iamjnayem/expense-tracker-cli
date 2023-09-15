<?php 
namespace CLI\App;
 
require_once './app/controller/MenuController.php';


use CLI\App\Controller\MenuController;
use Exception;

class App{

    private static $instance;


    private function __construct(){

    }

    public static function getInstance(){
        
        if(self::$instance == null){
            self::$instance = new self();
            return self::$instance;
        }
        return self::$instance;

    }

    public function run(){

        try{
            $this->loadHomeMenu();

        }catch(Exception $e){
            $e->getMessage() . "\n";
            $e->getFile() . "\n";
            $e->getLine() . "\n";
        }
    }

    public function loadHomeMenu(){
        $menu = new MenuController();
        $menu->showAllMenu();
    }
}