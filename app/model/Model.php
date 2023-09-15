<?php 

namespace CLI\App\Model;

require_once './app/repository/ReaderRepository.php';
require_once './app/repository/WriterRepository.php';


use CLI\App\Repository\ReaderRepository;
use CLI\App\Repository\WriterRepository;

class Model{

    protected $path;

    protected $reader;
    protected $writer;

    public function __construct($fileName)
    {

        $currentDirectory = __DIR__;
        $parentDiretory = dirname($currentDirectory);
        $dbParentDirectory = dirname($parentDiretory);
        

        $this->path = $dbParentDirectory . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . $fileName;

        $this->reader = new ReaderRepository($this->path);
        $this->writer = new WriterRepository($this->path);
    }

    public function all(){
        $content = $this->reader->read();
        return $content;
    }


    public function insert($data){

        $contents = $this->reader->read();
        if($contents === ""){
            $this->writer->write([$data]);
        }else{            
            $contents = json_decode($contents, true);
            $contents[] = $data;
            $this->writer->write($contents);
        }
    }

    public function getLastId(){
        $content = $this->reader->read();    
        if($content === "" || $content === null) return 0;
        $content = json_decode($content, true);
        return count($content);
    }
}