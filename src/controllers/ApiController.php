<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class ApiController extends Controller {

    public function handleRequest($req) { 

        $model = new \nighthawk\hw4\models\ApiModel();
        $model->initConnection();

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $data = substr($_POST['data'], 0, strlen($_POST['data']));
            $model->updateSheetByName($name, $data);
        }

        if (isset($_POST['code'])) {
            echo ($_POST['code']);
            echo "====>";
            echo ($_POST['data']);
        }


    }

}

?>