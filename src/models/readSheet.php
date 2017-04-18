<?php

namespace nighthawk\hw4\models;

require_once('model.php');

class ReadSheetModel extends Model {

    public function getData($key) {
        $query = "SELECT * From SHEET WHERE hash_code = ".$key;
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