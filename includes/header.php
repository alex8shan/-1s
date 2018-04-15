<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");

//if the user is not logged in, direct user to register page
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location:register.php");
}

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>+1s</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/icon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
    <script src="main.js"></script>
</head>

<body>

    <div id="mainContainer">
    
        <div id="topContainer">

            <?php include("includes/navBarContainer.php");?>

            <div id="mainViewContainer">
            
                <div id="mainContent">
