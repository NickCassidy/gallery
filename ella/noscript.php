<?php

    $thisDirectory = basename(__DIR__);

    $imgpath = 'https://www.simonturtle.com';  // The path to the gallery 

    $altmaxchars = "250";   // The maximum characters of the ALT tag taken from the caption 
 
    $doc = new DOMDocument();

    $doc->load( 'config.xml' );
  
    $gallery = $doc->getElementsByTagName("simpleviewergallery");
 
    $images = $doc->getElementsByTagName("image");

    // set initial value for tabindex
    $i=0;

print "<div id=\"noscriptImageAlignment\">\n";

    foreach( $images as $image )   

    {
        
        $largephoto = $image->getAttribute('imageURL');	 
	 
        /* strip slash and unwanted preceding dots from path  */        
        $largephoto = substr($largephoto, 3);   
   
		/* retrieve caption for each image */    
        $captions = $image->getElementsByTagName('caption');

        $caption = $captions->item(0)->nodeValue;
  
        $altcaption = substr($caption, 0, $altmaxchars);

        // increment tabindex on each loop 
        $i == $i++; 

        $pos = strrpos($altcaption, " ");    

    if ($pos>0) {

            $altcaption = substr($altcaption, 0, $pos);

                }
 

print "          <img src=\"$imgpath/$largephoto\" alt=\"$altcaption\" class=\"noscriptImages\" tabindex=\"$i\"/><p class=\"noscriptCaptions\">$caption</p>\n";

    }
print "</div>\n";

?>