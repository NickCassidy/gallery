<?php

    $thisDirectory = basename(__DIR__);

    $imgpath = 'https://www.simonturtle.com';  // The path to the gallery 

    $altmaxchars = "50";   // The maximum characters of the ALT tag taken from the caption 
 
    $doc = new DOMDocument();

    $doc->load( 'config.xml' );
  
    $gallery = $doc->getElementsByTagName("simpleviewergallery");
 
    $images = $doc->getElementsByTagName("image");

    // Count total number of images in config.xml to control display of last , in json list
    $totalNumberOfImages= $doc->getElementsByTagName("image")->length;


// Formatting for json script

print "             {\n";   

print "                     \"@context\":\"http://schema.org\",\n";

print "                     \"@type\":\"ImageObject\"\n";

print "                      }\n"; 

print "                     \"@graph\":\"\n";

print "                          [\n";

print "                             {\n"; 


    foreach( $images as $image )   

    {
        
        $largephoto = $image->getAttribute('imageURL');	 
	 
        /* strip slash and unwanted preceding dots from path  */        
        $largephoto = substr($largephoto, 3);   
   
		/* retrieve caption for each image */    
        $captions = $image->getElementsByTagName('caption');

        $caption = $captions->item(0)->nodeValue;
  
        $altcaption = substr($caption, 0, $altmaxchars);

        /* retrieve index number for each image for tabindexing */ 
        $indexes = $image->getElementsByTagName('index');

        $i = $indexes->item(0)->nodeValue;

        /* retrieve about for each image */ 
        $aboutContent = $image->getElementsByTagName('about');

        $about = $aboutContent->item(0)->nodeValue;

        /* retrieve text for each image */ 
        $textContent = $image->getElementsByTagName('text');

        $text = $textContent->item(0)->nodeValue;

        /* retrieve creator for each image */ 
        $creatorContent = $image->getElementsByTagName('creator');

        $creator = $creatorContent->item(0)->nodeValue;

        /* retrieve copyright date for each image */ 
        $copyrightDateContent = $image->getElementsByTagName('copyrightYear');

        $copyrightDate = $copyrightDateContent->item(0)->nodeValue;

        /* retrieve copyright holder for each image */ 
        $copyrightHolderContent = $image->getElementsByTagName('copyrightHolder');

        $copyrightHolder = $copyrightHolderContent->item(0)->nodeValue;

        /* retrieve date created for each image */ 
        $dateCreatedContent = $image->getElementsByTagName('dateCreated');

        $dateCreated = $dateCreatedContent->item(0)->nodeValue;

         /* retrieve family friendly status for each image */ 
        $familyFriendlyContent = $image->getElementsByTagName('isFamilyFriendly');

        $familyFriendly = $familyFriendlyContent->item(0)->nodeValue;

        /* retrieve editor information for each image */ 
        $editorContent = $image->getElementsByTagName('editor');

        $editor = $editorContent->item(0)->nodeValue;

        /* retrieve location information for each image */ 
        $locationContent = $image->getElementsByTagName('locationCreated');

        $location = $locationContent->item(0)->nodeValue;

        /* retrieve source information for each image */ 
        $sourceContent = $image->getElementsByTagName('sourceOrganization');

        $source = $sourceContent->item(0)->nodeValue;

        /* retrieve thumbnail URL for each image */ 
        $thumbnailContent = $image->getElementsByTagName('thumbnailURL');

        $thumbnailURL = $thumbnailContent->item(0)->nodeValue;

        
print "                                 \"about\":\"$about\",\n"; 

print "                                 \"caption\":\"$caption\",\n";

print "                                 \"text\":\"$text\",\n";

print "                                 \"creator\":\"$creator\",\n";

print "                                 \"copyrightYear\":\"$copyrightDate\",\n";

print "                                 \"copyrightHolder\":\"$copyrightHolder\",\n";

print "                                 \"dateCreated\":\"$dateCreated\",\n";

print "                                 \"isFamilyFriendly\":\"$familyFriendly\",\n";

print "                                 \"editor\":\"$editor\",\n";

print "                                 \"locationCreated\":\"$location\",\n";

print "                                 \"sourceOrganization\":\"$source\",\n";

print "                                 \"thumbnailURL\":\"$thumbnailURL\",\n";

print "                                 \"image\":\"$imgpath/$largephoto\",\n";

print "                                 \"url\":\"$imgpath/$largephoto\"\n";


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