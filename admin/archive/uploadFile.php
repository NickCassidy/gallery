<?php session_start();


// the uploaded filename is $_FILES['file']['name']; 

// save name of uploaded file in session
$_SESSION['uploadedFilename'] = $_FILES['file']['name'];

// test echo $_SESSION['uploadedFilename'];

//$imgpath = 'https://www.achromat.net/simon/web';  // The path to the gallery 

define("UPLOAD_DIR", "");

if (!empty($_FILES["file"])) {
    $myFile = $_FILES["file"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

// verify the file is a GIF, JPEG, or PNG
$fileType = exif_imagetype($_FILES["file"]["tmp_name"]);
$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_JPG);
if (!in_array($fileType, $allowed)) {
    	// file type is not permitted
		echo "wrong file type";
}

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }
}



// load the form page
require "form.php";

?>
