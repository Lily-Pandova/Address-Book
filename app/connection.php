<?php

function dbConnection() {

    $connect = mysqli_connect("localhost", "root", "", "book");
    $connect->set_charset('utf8');
    return $connect;

}


