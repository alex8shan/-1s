<?php

    ob_start();

    session_start();

    $timezone = date_default_timezone_set("America/Chicago");

    // try {
    //      $db = new PDO("mysql:host=mysql.truman.edu;dbname=ms1723CS315", "ms1723", "eemahdam");

    // } catch (PDOException $e) {
    //     print "Error!: " . $e->getMessage() . "<br/>";
    //     die();
    // }

    $con = mysqli_connect("mysql.truman.edu", "ms1723", "eemahdam", "ms1723CS315");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to database" . mysqli_connect_errno();
    }

?>