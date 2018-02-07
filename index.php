<?php

include("includes/config.php");

//temporarily log out
//session_destroyer();

if(isset($_SESSION['userLoggedIn'])) {
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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <p>This is a Spotify clone where users will be able to: </p>

    <ul>
        <li>Sign up</li>
        <li>Search for all their favorite artists, albums and songs in real time!</li>
        <li>Create and customize their own playlists</li>
        <li>Control the music with all the usual controls such as play, pause, skip, previous, shuffle, repeat etc.</li>
    </ul>
    
    <p>The technology that is planned to be used in this project is: HTML, CSS, PHP, JQuery, JavaScript and MySQL</p>

</body>
</html>