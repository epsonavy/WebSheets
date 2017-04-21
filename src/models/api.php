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
        $query = "SELECT * From SHEET_CODES WHERE hash_code = '".$code."'";
        $result = mysqli_query($this->mysql, $query);
        $id = "";
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['sheet_id'];
        }
        if($result) {
            $result->free();
        }
        
        $query = "UPDATE SHEET SET sheet_data = '".$data."' WHERE sheet_id = '".$id."'";
        if (mysqli_query($this->mysql, $query)) {
            //echo "New record created successfully";
        } else {
            echo mysqli_error($this->mysql);
        }
    }

}

?>