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
 	
  print "<section id=\"galleryImages\">";
  
  $images = $doc->getElementsByTagName( "image" );
	
  print "<ul>";
  print "<p>Photo gallery of Simon Turtle, a London based people and portrait photographer specialising in actors, celebrities, comedians and theatre advertising. All images Copyright 2018 Simon Turtle</p>" . PHP_EOL;
  foreach( $images as $image )
  {
 	 
	 $largephoto = $image->getAttribute('imageURL');	 
	 
	 // strip unwanted preceding dots from path   
 	 $largephoto = substr($largephoto, 2);   
   
   

   $captions = $image->getElementsByTagName( "caption" );
 	 $caption = $captions->item(0)->nodeValue;
  
		$altcaption = substr($caption, 0, $altmaxchars);
      $pos = strrpos($altcaption, " ");
      if ($pos>0) {
       $altcaption = substr($altcaption, 0, $pos);
      }
		  
	  print "<li style=\"list-style-type: none;\"><p><a href=\"$imgpath$largephoto\"><img src=\"$imgpath/$largephoto\"alt=\"$altcaption\"></a><caption>$caption</caption></li>" . PHP_EOL;

   }
   print "</ul>";
  print "</section>"; 
?>