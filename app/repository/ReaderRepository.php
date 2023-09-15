<?php

namespace CLI\App\Repository;

class ReaderRepository
{
    
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function read()
    {
        if(file_exists($this->path)){
            return file_get_contents($this->path);
        }else{
            $file = fopen($this->path, 'w');

            if($file){
                chmod($this->path, 0777);
                fclose($file);
                return "";
            }
            else{
                die("Could not save your data to db\n");
            }
        }
    }

}
