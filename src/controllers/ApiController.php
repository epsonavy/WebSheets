<?php

namespace nighthawk\hw4\controllers;

require_once('controller.php');

class ApiController extends Controller {

    public function handleRequest($req) { 

        header("Content-Type: application/json");
        $obj = json_decode(stripslashes(file_get_contents("php://input")));
        $name = $code = $data = "";

        if($obj->name != "null") {
            $name = $obj->name;
        }
        if($obj->code != "null") {
            $code = $obj->code;
        }
        if($obj->table) {
            $data = json_encode($obj->table);
        }
        $model = new \nighthawk\hw4\models\ApiModel();
        $model->initConnection();

        if ($name != "") {
            $model->updateSheetByName($name, $data);
        } 
        if ($code != "") {
            $model->updateSheetByCode($code, $data);
        }
    }
}

?>