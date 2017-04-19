<?php

namespace nighthawk\hw4\models;

require_once('model.php');

class EditSheetModel extends Model {

    public function addSheet_getID($name, $data) {

        $query = "INSERT INTO SHEET VALUES (DEFAULT,'".$name."', '".$data."')";
        if (mysqli_query($this->mysql, $query)) {
            //echo "New record created successfully";
        } else {
            echo mysqli_error($this->mysql);
        }
        
        $query = "SELECT * From SHEET WHERE sheet_name = '".$name."'";
        $result = mysqli_query($this->mysql, $query);
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row['sheet_id']);
        }
        if($result) {
            $result->free();
        }
        return $array;
    }

    public function addHashCode($id, $code, $type) {
        $query = "INSERT INTO SHEET_CODES VALUES (DEFAULT,'".$id."', '".$code."', '".$type."')";
        if (mysqli_query($this->mysql, $query)) {
            //echo "New record created successfully";
        } else {
            echo mysqli_error($this->mysql);
        }
    }

    public function getDataByName($name) {
        $query = "SELECT * From SHEET WHERE sheet_name = '".$name."'";
        $result = mysqli_query($this->mysql, $query);
        $array = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($array, $row['sheet_data']);
        }
        if($result) {
            $result->free();
        }
        return $array;
    }

    public function getDataByCode($key) {
        $query = "SELECT * From SHEET_CODES WHERE hash_code = '".$key."'";
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

    public function getDataById($id) {
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