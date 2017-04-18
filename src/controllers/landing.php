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
$logger->info('Visited landing page');

class LandingController extends Controller {

    public function handleRequest($req) { 
        $view = new \nighthawk\hw4\views\LandingView();

        $view->render($req);
    }

}

?>