<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class LandingController extends Controller {

    public function handleRequest($req) { 
        $view = new \nighthawk\hw4\views\LandingView();

        $view->render($req);
    }

}

?>