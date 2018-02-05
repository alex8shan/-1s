<?php
    ob_start();

    $timezone = date_default_timezone_set("America/Chicago");

    $con = mysqli_connect("localhost", "root", "", "+1s");

    if(mysqli_connect_error()) {
        echo "Failed to connect to database" . mysqli_connect_error();
    }

?>