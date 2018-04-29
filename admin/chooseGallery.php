<?php session_start(); 
// retrieve name of uploaded file from the cookie set by indexDropzonePageThumb.php so it can be inserted into filename field in form using: echo $_COOKIE["uploadedFilename"];
?>

<!DOCTYPE html> 
<html lang="en">
<head>
      <link href="dropzone/css/general.css" type="text/css" rel="stylesheet" />
      <link href="dropzone/css/dropzone.css" type="text/css" rel="stylesheet" />
      <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:700">      
</head>  
<body>
  		<div id="chooseGallery">
			<h1>Create a new photo item</h1>
      <p>You can add files to an existing gallery and create a new config.xml file or create a new client gallery</p>
			<h2 class="homepageH2Title">Choose an existing gallery</h2>
  				<a href="dropzone/indexDropzonePage.php?name=portfolio"><input type="gallery" value="Portfolio" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?name=portraits"><input type="gallery" value="Portraits" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?name=archive"><input type="gallery" value="Archive" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?name=posters"><input type="gallery" value="Posters" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?name=ella"><input type="gallery" value="Ella" class="buttonChooseGallery buttonHover"></a>

      <h2 class="homepageH2Title">Create a client gallery</h2>
      <form action="dropzone/indexDropzonePage.php" method="GET">
          <p class="formLabel">Enter name of client (an image and thumbnail folder will be created automatically)</p>
          <input type="text" name="name" size="100" value="">
          <input type="submit" value="Submit" class="button buttonHover">
      </form>  

    </div>
</body>
</html>