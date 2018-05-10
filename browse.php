<?php 
include("includes/includedFiles.php"); 
?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">

	<?php

		//randomly displaying album info
		//use prepare + execute to prevent SQL injection
		//$albumQuery = $db->prepare("SELECT * FROM albums ORDER BY RAND() LIMIT 5")

		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 5");
		//try {
		
		
		// $sql = "SELECT id, title, artworkPath FROM albums ORDER BY RAND() LIMIT 5";
		// $stmt = $db->prepare($sql);
		// $stmt->execute();
		// while($row = $stmt->Fetch(PDO::FETCH_ASSOC)) {
		while($row = mysqli_fetch_array($albumQuery)) {

            echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";
            
		}
	?>

</div>  
