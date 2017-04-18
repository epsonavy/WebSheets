<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class LandingController extends Controller {

    public function handleRequest($req) { 
        $model = new \nighthawk\hw4\models\LandingModel();
        $view = new \nighthawk\hw4\views\LandingView();
        $array = Array();

        $model->initConnection();
        array_push($array, $model->getLists());
        array_push($array, $model->getNotes());

        $view->render($array);
    }

}

?>