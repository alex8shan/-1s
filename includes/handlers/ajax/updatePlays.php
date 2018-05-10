<?php
include("../../config.php");

if(isset($_POST['songId'])) {
	//Updated with mysqli prepare to prevent SQL injection
	$stmt = $con->prepare("UPDATE songs SET plays = plays + 1 WHERE id= ?");
	$stmt->bind_param("i", $_POST['songId']);
	$stmt->execute();
	$stmt->close();
}
?>