<?php session_start(); ?>
<!-- start session -->

<!-- NB this file requires query string to match the image folder name eg indexDropzonePage.php?name=cow will store file upload into the 'cow' folder-->

<html> 

	<head>   
			<link href="css/general.css" type="text/css" rel="stylesheet" />
			<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
			<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
        	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
        	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:700">
        	<script src="dropzone.js"></script>
 	</head>
 	<body>
	
<?php 

echo '<h1>Upload files</h1>'; 

// get specific image folder name from query string and save into a variable
$storeFolder = $_GET["name"];

echo "<p>This file will be saved in the <strong>" . $storeFolder . "</strong> folder</p>";

// store the image folder name in a session
$_SESSION['nameOfFolder']=$storeFolder;

//print session array for testing
//print_r($_SESSION);

?>

		<h2>Main photo</h2>

		<form action="imageUploadMainPhoto.php" class="dropzone" method="GET" name="" enctype=”multipart/form-data”></form>

<a href="indexDropzonePageThumb.php?name=horse" style="color:blue";>Upload thumbnail</a>
		
	</body>
 
 </html>
