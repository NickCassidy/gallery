<?php

    $thisDirectory = basename(__DIR__);

    $imgpath = 'https://www.simonturtle.com';  // The path to the gallery 

    $altmaxchars = "250";   // The maximum characters of the ALT tag taken from the caption 
 
    $doc = new DOMDocument();

    $doc->load( 'config.xml' );
  
    $gallery = $doc->getElementsByTagName("simpleviewergallery");
 
    $images = $doc->getElementsByTagName("image");

    // Count total number of images in config.xml to control display of last , in json list
    $totalNumberOfImages= $doc->getElementsByTagName("image")->length;

   
 // set initial value for counter
    $i=0;

// Formatting for json script

print "             {\n";   

print "                     \"@context\":\"http://schema.org\",\n";

print "                     \"@type\":\"ImageObject\"\n";

print "                      }\n"; 

print "                     \"@graph\":\n";

print "                          [\n";

print "                             {\n"; 


    foreach( $images as $image )   

    {
        
        $largephoto = $image->getAttribute('imageURL');	 
	 
        /* strip slash and unwanted preceding dots from path  */        
        $largephoto = substr($largephoto, 3);   
   
        /* render absolute URL for largephoto */
        $absLargephotoURL  = $imgpath . '/' . $largephoto;        

        /* retrieve thumbnail URL for each image */ 
        $thumbnailURL = $image->getAttribute('thumbURL');

        /* strip slash and unwanted preceding dots from path  */        
        $thumbnailURL = substr($thumbnailURL, 3); 

        /* render absolute URL for thumbnail */
        $absThumbnailURL  = $imgpath . '/' . $thumbnailURL;


		/* retrieve caption for each image */    
        $captions = $image->getElementsByTagName('caption');

        $caption = $captions->item(0)->nodeValue;
  
        $altcaption = substr($caption, 0, $altmaxchars);



        /* retrieve about for each image */ 
        $aboutContent = $image->getElementsByTagName('about');

        $about = $aboutContent->item(0)->nodeValue;



        /* retrieve text for each image */ 
        $textContent = $image->getElementsByTagName('text');

        $text = $textContent->item(0)->nodeValue;



        /* retrieve copyright date for each image */ 
        $copyrightDateContent = $image->getElementsByTagName('copyrightYear');

        $copyrightDate = $copyrightDateContent->item(0)->nodeValue;



        $copyrightHolder_creator_editor = "Simon Turtle";


        /* all Simon's photos are family friendly */
        $familyFriendly = "true";



        /* retrieve location information for each image */ 
        $locationContent = $image->getElementsByTagName('locationCreated');

        $location = $locationContent->item(0)->nodeValue;



        /* retrieve source information for each image */ 
        $sourceContent = $image->getElementsByTagName('sourceOrganisation');

        $source = $sourceContent->item(0)->nodeValue;


        // increment counter on each loop 
        ++$i; 

        
print "                                 \"about\":\"$about\",\n"; 

print "                                 \"caption\":\"$caption\",\n";

print "                                 \"text\":\"$text\",\n";

print "                                 \"creator\":\"$copyrightHolder_creator_editor\",\n";

print "                                 \"copyrightYear\":\"$copyrightDate\",\n";

print "                                 \"copyrightHolder\":\"$copyrightHolder_creator_editor\",\n";

print "                                 \"isFamilyFriendly\":\"$familyFriendly\",\n";

print "                                 \"editor\":\"$copyrightHolder_creator_editor\",\n";

print "                                 \"locationCreated\":\"$location\",\n";

print "                                 \"sourceOrganization\":\"$source\",\n";

print "                                 \"thumbnailURL\":\"$absThumbnailURL\",\n";

print "                                 \"url\":\"$absLargephotoURL\"\n";


        if ($i < $totalNumberOfImages) 
        {

print "                             },\n";
        }

        elseif ($i == $totalNumberOfImages) 
        {

print "                             }\n";
        }

    }

print "                          ]\n";

print "                      }\n";

?>