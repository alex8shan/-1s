<?php
// Determines if the user typed url manually or via ajax. If the url is triggered via ajax the 
//header and footer will not be loaded, only the mainContent
if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("config.php");
    include("classes/Artist.php");
    include("classes/Album.php");
    include("classes/Song.php");
} else {
    include("header.php");
    include("footer.php");

    $url = $_SERVER['REQUEST_URI'];
	echo "<script>openPage('$url')</script>";
	exit();
}
?>