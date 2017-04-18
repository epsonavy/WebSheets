<?php
    
    // Before run command line "php CreateDb.php"
    // Make sure MySQL datebase setting is corret in file config.php 
    require_once('./Config.php'); 

    // Create database
    $mysql = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS);
    if (!$mysql) {
        die('Could not connect to MySQL: ' . mysql_error());
    }

    $db = mysqli_select_db($mysql, DB_USE);
    if (!$db) {
    $query = 'CREATE DATABASE '.DB_USE;
    if (!mysqli_query($mysql, $query)) {
      echo 'Error creating database: '. DB_USE . mysql_error() . "\n";
    }
    }
    mysqli_close($mysql);

    // Create Table
    $db = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS, DB_USE);

    $query = "SELECT sheet_id FROM SHEET";
    $result = mysqli_query($db, $query);
    if(empty($result)) {
        $query = "CREATE TABLE SHEET (
                    sheet_id INT AUTO_INCREMENT,
                    sheet_name VARCHAR(255) NOT NULL,
                    sheet_data VARCHAR(25500) NOT NULL,
                    PRIMARY KEY (sheet_id)
                )";
        $result = mysqli_query($db, $query);
    }

    $query = "SELECT sheet_id FROM SHEET_CODES";
    $result = mysqli_query($db, $query);
    if(empty($result)) {
        $query = "CREATE TABLE SHEET_CODES (
                    sheet_id INT AUTO_INCREMENT,
                    hash_code VARCHAR(255) NOT NULL,
                    code_type VARCHAR(255) NOT NULL
                    PRIMARY KEY (sheet_id)
                )";
        $result = mysqli_query($db, $query);
    }

    $db->close();
    echo 'Created database: '. DB_USE .' successfully!'."\n" ;
?>