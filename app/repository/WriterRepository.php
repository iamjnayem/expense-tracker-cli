<?php 

namespace CLI\App\Repository;


class WriterRepository{

    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }


    public function write($content){
        if(!file_exists($this->path)){
            $file = fopen($this->path, 'w');

            if($file){
                chmod($this->path, 0777);
                fclose($file);
            }
            else{
                die("Could not save your data to db\n");
            }
        }else{
            file_put_contents($this->path, json_encode($content));
        }

    }

}