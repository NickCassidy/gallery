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
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css" type="text/css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>      
</head>  
<body>
  <div id="chooseGallery">
			<h1>Create a new photo item</h1>
  
      <p>You can add files to an existing gallery and create a new config.xml file or create a new client gallery</p>
	
  		<h2 class="homepageH2Title">Choose an existing gallery</h2>
  				<a href="dropzone/indexDropzonePage.php?gallery=portfolio"><input type="gallery" value="portfolio" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?gallery=portraits"><input type="gallery" value="portraits" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?gallery=archive"><input type="gallery" value="archive" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?gallery=posters"><input type="gallery" value="posters" class="buttonChooseGallery buttonHover"></a>
  				<a href="dropzone/indexDropzonePage.php?gallery=ella"><input type="gallery" value="ella" class="buttonChooseGallery buttonHover"></a>

      <h2 class="homepageH2Title">Create a client gallery</h2>

      <form action="dropzone/indexDropzonePage.php" method="GET">
          <p class="formLabel">Enter name of client (an image and thumbnail folder will be created automatically)</p>
          <input type="text" class="form-control" name="gallery" data-sanitize="escape" size="100" value="">
          <input type="submit" value="Submit" class="button buttonHover">
      </form>  

  <script> 
  $.validate({
  modules : 'sanitize',
  addValidClassOnAll : true,
  errorMessagePosition : 'inline',
  errorMessageClass : 'form-error'
  });
  </script>

  </div>
</body>
</html>