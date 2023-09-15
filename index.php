<?php

require_once './app/app.php';

use CLI\App\App;

try {

    $app = App::getInstance();
    $app->run();

} catch (Exception $e) {
    echo $e->getMessage() . "\n";
    echo $e->getFile() . "\n";
    echo $e->getLine() . "\n";
}
