<?php

// NB this is the poster version of noscript which handles fact that there're no captions  

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
   
		/* retrieve about information for each image */    
        $aboutContent = $image->getElementsByTagName('about');

        $about = $aboutContent->item(0)->nodeValue;

        /* retrieve text information for each image */    
        $textContent = $image->getElementsByTagName('text');

        $text = $textContent->item(0)->nodeValue;        
  
        $altcaption = substr($caption, 0, $altmaxchars);

        // increment tabindex on each loop 
        $i == $i++; 
        
print "          <img src=\"$imgpath/$largephoto\" alt=\"$about\" class=\"noscriptImages\" tabindex=\"$i\"/><p class=\"noscriptCaptions\">$text</p>\n";

    }
print "</div>\n";

?>