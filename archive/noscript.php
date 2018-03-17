<?php
######################################################
# Project:		SimpleViewer SEO Gallery Plugin		 #
# Version:		2.02								 #
# Author:		Mikael Kjellstrom					 #
# License:		Copyright (c) 2010 Mikael Kjellstrom #
######################################################

 $imgpath = 'https://www.achromat.net/simon_new/web';  // The path to the gallery 
 $altmaxchars = "50";   // The maximum characters of the ALT tag taken from the caption 
 
 $thisDirectory = basename(__DIR__);

  $doc = new DOMDocument();
  $doc->load( 'config.xml' );
  
  $gallery = $doc->getElementsByTagName( "simpleviewergallery" );
  
  $images = $doc->getElementsByTagName( "image" );
	
  print "<div = id=\"noscriptImageAlignment\">";

  foreach( $images as $image )
  {
 	 
	 $largephoto = $image->getAttribute('imageURL');	 
	 
	 // strip slash and unwanted preceding dots from path   
 	 $largephoto = substr($largephoto, 3);   
   
   

   $captions = $image->getElementsByTagName( "caption" );
 	 $caption = $captions->item(0)->nodeValue;
  
		$altcaption = substr($caption, 0, $altmaxchars);
      $pos = strrpos($altcaption, " ");
      if ($pos>0) {
       $altcaption = substr($altcaption, 0, $pos);
      }

	  print "<img src=\"$imgpath/$largephoto\" alt=\"$altcaption\" class=\"noscriptImages\"\"/><p class=\"noscriptCaptions\"\">$caption</p>\n";

   }
    print "</div>";

?>