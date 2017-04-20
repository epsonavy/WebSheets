<?php

namespace nighthawk\hw4\controllers;

//echo ($_POST['name']);
echo ($_POST['data']);

require_once('controller.php');

class ApiController extends Controller {

    public function handleRequest($req) { 
        
        $model = new \nighthawk\hw4\models\ApiModel();
        $model->initConnection();
        
    }

}

?>