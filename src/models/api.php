<?php

namespace nighthawk\hw4\models;

require_once('model.php');

class ApiModel extends Model {

    public function updateSheet($name, $data) {

        $query = "INSERT INTO SHEET VALUES (DEFAULT,'".$name."', '".$data."')";
        if (mysqli_query($this->mysql, $query)) {
            //echo "New record created successfully";
        } else {
            echo mysqli_error($this->mysql);
        }
    }

}

?>