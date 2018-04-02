<?php session_start();

$thisDirectory = basename(__DIR__);

//$imgpath = 'https://www.achromat.net/simon/web';  // The path to the gallery 

if ($_FILES['file']['name'] != "")
	{
		copy ($_FILES['file']['tmp_name'], $_FILES['file']['name'])
		or die ("can't move the file"); 
	}
	else {die( "No file specified");}

// the uploaded filename is $_FILES['file']['name']; 


// save name of uploaded file in session
$_SESSION['uploadedFilename'] = $_FILES['file']['name'];


// test echo $_SESSION['uploadedFilename'];

// load the form page
require "form.php";

?>
