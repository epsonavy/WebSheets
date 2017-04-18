<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler('app_data/my_app.log', Logger::DEBUG));
//$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('Visited read sheet page');

class ReadSheetController extends Controller {

    public function handleRequest($req) { 

        $model = new \nighthawk\hw4\models\ReadSheetModel();
        $view = new \nighthawk\hw4\views\ReadSheetView();
        $array = Array();

        $model->initConnection();
        
        $view->render($array);
    }

}

?>