<?php

    ob_start();

    session_start();

    $timezone = date_default_timezone_set("America/Chicago");

    $con = mysqli_connect("localhost", "root", "", "+1s");

    if(mysqli_connect_errno()) {
        echo "Failed to connect to database" . mysqli_connect_errno();
    }

?>