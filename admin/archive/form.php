<?php session_start(); ?>
<!DOCTYPE html> 
<html lang="en">
<h1>Create new record</h1>
  <form action="submitForm.php" method="GET">
  Filename<br>
  <input type="text" name="filename" size="50" value="<?php print ($_SESSION['uploadedFilename']); ?>" readonly>
  <br><br>
  File type<br>
  <input type="radio" name="isThumbnail" value="0" checked="checked">Main image<br>
  <input type="radio" name="isThumbnail" value="1">Thumbnail
  <br><br>
  Gallery<br>
  <select name="gallery" size="1">
    <option value="portraits">Portraits</option>
    <option value="portfolio">Portfolio</option>
    <option value="posters">Posters</option>
    <option value="archive">Archive</option>
    <option value="ella">Ella</option>
  </select>  
  <br><br>
  Caption<br>
  <textarea name="caption" rows="10" cols="50"></textarea><br>
  About<br>
  <textarea name="aboutContent" rows="10" cols="50"></textarea><br><br>
  Text<br>
  <textarea name="textContent" rows="10" cols="50"></textarea><br><br> 
  Copyright Year(s) (comma separated if more than one)<br>
  <input type="text" name="copyrightDate" size="50" value=""><br><br>
  Location(s) (comma separated if more than one)<br>
  <input type="text" name="location" size="50" value=""><br><br>
  Source Organisation(s) (comma separated if more than one)<br>
  <input type="text" name="sourceOrganisation" size="50" value=""><br><br>
  
  <input type="submit" value="Submit" ><br><br>
  <input type="reset">
</form>
</html>