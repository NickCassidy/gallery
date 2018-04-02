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
  First Copyright Year<br>
  <select name="firstCopyrightDate" size="4" multiple>
  	<option value="1985">1985</option>
  	<option value="1986">1986</option>
  	<option value="1987">1987</option>
  	<option value="1988">1988</option>
  	<option value="1989">1989</option>
  	<option value="1990">1990</option>
  	<option value="1991">1991</option>
  	<option value="1992">1992</option>
  	<option value="1993">1993</option>
  	<option value="1994">1994</option>
  	<option value="1995">1995</option>
  	<option value="1996">1996</option>
  	<option value="1997">1997</option>
  	<option value="1998">1998</option>
  	<option value="1999">1999</option>
  	<option value="2000">2000</option>
  	<option value="2001">2001</option>
  	<option value="2002">2002</option>
  	<option value="2003">2003</option>
  	<option value="2004">2004</option>
  	<option value="2005">2005</option>
  	<option value="2006">2006</option>
  	<option value="2007">2007</option>
  	<option value="2008">2008</option>
  	<option value="2009">2009</option>
  	<option value="2010">2010</option>
  	<option value="2011">2011</option>
  	<option value="2012">2012</option>
  	<option value="2013">2013</option>
  	<option value="2014">2014</option>
  	<option value="2015">2015</option>
  	<option value="2016">2016</option>
  	<option value="2017">2017</option>
  	<option value="2018">2018</option>
  	<option value="2019">2019</option>
  	<option value="2020">2020</option>
  </select>	
  	<br><br>
 Second Copyright Year<br>
  <select name="secondCopyrightDate" size="4" multiple>
  	<option value="1985">1985</option>
  	<option value="1986">1986</option>
  	<option value="1987">1987</option>
  	<option value="1988">1988</option>
  	<option value="1989">1989</option>
  	<option value="1990">1990</option>
  	<option value="1991">1991</option>
  	<option value="1992">1992</option>
  	<option value="1993">1993</option>
  	<option value="1994">1994</option>
  	<option value="1995">1995</option>
  	<option value="1996">1996</option>
  	<option value="1997">1997</option>
  	<option value="1998">1998</option>
  	<option value="1999">1999</option>
  	<option value="2000">2000</option>
  	<option value="2001">2001</option>
  	<option value="2002">2002</option>
  	<option value="2003">2003</option>
  	<option value="2004">2004</option>
  	<option value="2005">2005</option>
  	<option value="2006">2006</option>
  	<option value="2007">2007</option>
  	<option value="2008">2008</option>
  	<option value="2009">2009</option>
  	<option value="2010">2010</option>
  	<option value="2011">2011</option>
  	<option value="2012">2012</option>
  	<option value="2013">2013</option>
  	<option value="2014">2014</option>
  	<option value="2015">2015</option>
  	<option value="2016">2016</option>
  	<option value="2017">2017</option>
  	<option value="2018">2018</option>
  	<option value="2019">2019</option>
  	<option value="2020">2020</option>
  </select>	
  	<br><br>
    Third Copyright Year<br>
  <select name="thirdCopyrightDate" size="4" multiple>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
  </select>
  <br><br> 	
  First Location<br>
  <input type="text" name="firstLocation" size="50" value=""><br><br>
  Second Location<br>
  <input type="text" name="secondLocation" size="50" value=""><br><br>
  First Source Organisation<br>
  <input type="text" name="firstSourceOrganisation" size="50" value=""><br><br>
  Second Source Organisation<br>
  <input type="text" name="secondSourceOrganisation" size="50" value=""><br><br>
  Third Source Organisation<br>
  <input type="text" name="thirdSourceOrganisation" size="50" value=""><br><br>

  <input type="submit" value="Submit" ><br><br>
  <input type="reset">
</form>
<?php require "submissionSuccess.php"; ?>
</html>