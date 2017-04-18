<?php

namespace nighthawk\hw4\models;

require_once('model.php');

class ReadSheetModel extends Model {

    public function getID_with_mode($key) {
        $query = "SELECT * From SHEET_CODES WHERE hash_code = ".$key;
        $result = mysqli_query($this->mysql, $query);
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row['sheet_id']);
            array_push($array, $row['code_type']);
        }
        if($result) {
            $result->free();
        }
        return $array;
    }

    public function getData($id) {
        $query = "SELECT * From SHEET WHERE sheet_id = ".$id;
        $result = mysqli_query($this->mysql, $query);
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row['sheet_name']);
            array_push($array, $row['sheet_data']);
        }
        if($result) {
            $result->free();
        }
        return $array;
    }
}

?>