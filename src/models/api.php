<?php

namespace nighthawk\hw4\models;

require_once('model.php');

class ApiModel extends Model {

    public function updateSheetByName($name, $data) {

        $query = "UPDATE SHEET SET sheet_data = '".$data."' WHERE sheet_name = '".$name."'";
        if (mysqli_query($this->mysql, $query)) {
            //echo "New record created successfully";
        } else {
            echo mysqli_error($this->mysql);
        }
    }

    public function updateSheetByCode($code, $data) {

    }

}

?>