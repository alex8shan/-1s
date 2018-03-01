<?php

include "includes/config.php";

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
                <div id="navBarContainer">
                    <nav class="navBar">
                        <a href="index.php" class="logo">
                            <img src="assets/img/icons/logo.png">
                        </a>
                        <div class="group">

                            <div class="navItem">
                                <a href="search.php" class="navItemLink">Search
                                    <img src="assets/img/icons/search.png" class="icon" alt="Search">
                                </a>
                            </div>

                        </div>

                        <div class="group">
                            <div class="navItem">
                                <a href="browse.php" class="navItemLink">Browse</a>
                            </div>

                            <div class="navItem">
                                <a href="yourMusic.php" class="navItemLink">Your Music</a>
                            </div>

                            <div class="navItem">
                                <a href="profile.php" class="navItemLink">Zhang Zhe</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div id="mainViewContainer">
                    <div id="mainContent">
                        <h1 class="pageHeadingBig">You Might Also Like</h1>
                        <div class="gridViewContainer">
                            <div class='gridViewItem'>
                                <img src="assets/img/artwork/run.jpg" style="padding: 20px;">
                            </div>

                            <div class='gridViewItem'>
                                <img src="assets/img/artwork/height.jpg" style="padding: 20px;">
                            </div>

                            <div class='gridViewItem'>
                                <img src="assets/img/artwork/experience.jpg" style="padding: 20px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nowPlayingBarContainer">
                <div id="nowPlayingBar">
                    <div id="nowPlayingLeft">
                        <div class="content">
                            <span class="albumLink">
                                <img src="assets/img/album.jpg" class="albumArtwork">
                            </span>

                            <div class="trackInfo">
                                <span class="trackName">
                                    <span>HAHA Style
                                        <span>
                                        </span>

                                        <span class="artistName">
                                            <span>Zhang Zhe</span>
                                        </span>
                            </div>
                        </div>
                    </div>

                    <div id="nowPlayingCenter">

                        <div class="content playerControls">

                            <div class="buttons">

                                <button class="controlButton shuffle" title="Shuffle button">
                                    <img src="assets/img/icons/shuffle.png" alt="Shuffle">
                                </button>

                                <button class="controlButton previous" title="Previous button">
                                    <img src="assets/img/icons/previous.png" alt="Previous">
                                </button>

                                <button class="controlButton play" title="Play button">
                                    <img src="assets/img/icons/play.png" alt="Play">
                                </button>

                                <button class="controlButton pause" title="Pause button" style="display: none;">
                                    <img src="assets/img/icons/pause.png" alt="Pause">
                                </button>

                                <button class="controlButton next" title="Next button">
                                    <img src="assets/img/icons/next.png" alt="Next">
                                </button>

                                <button class="controlButton repeat" title="Repeat button">
                                    <img src="assets/img/icons/repeat.png" alt="Repeat">
                                </button>

                            </div>


                            <div class="playbackBar">

                                <span class="progressTime current">0.00</span>

                                <div class="progressBar">
                                    <div class="progressBarBg">
                                        <div class="progress"></div>
                                    </div>
                                </div>

                                <span class="progressTime remaining">0.00</span>


                            </div>


                        </div>


                    </div>

                    <div id="nowPlayingRight">
                        <div class="volumeBar">

                            <button class="controlButton volume" title="Volume button">
                                <img src="assets/img/icons/volume.png" alt="Volume">
                            </button>

                            <div class="progressBar">
                                <div class="progressBarBg">
                                    <div class="progress"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>