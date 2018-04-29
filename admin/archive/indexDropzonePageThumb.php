<?php
session_start();
?>
<!-- NB this file requires query string to match the image folder name eg indexDropzonePage.php?name=cow -->

<html> 

	<head>   
			<link href="general.css" type="text/css" rel="stylesheet" />
			<link href="dropzone.css" type="text/css" rel="stylesheet" />
			<script src="dropzone.js"></script>
 	</head>
 	<body>
	
<?php 

echo '<h1>Upload files</h1>'; 

// get specific image folder name from query string and save into a variable
$storeFolder = $_GET["name"];

echo $storeFolder;

// store the image folder name in a session
$_SESSION['nameOfFolder']=$storeFolder;

//print session array for testing
print_r($_SESSION);


?>

		<h2>Thumb photo</h2>
				
		<form action="imageUploadThumbPhoto.php" class="dropzone" method="_GET" ></form>

<a href="form.php" style="color:blue";>Form</a>



	</body>
 
 </html>
