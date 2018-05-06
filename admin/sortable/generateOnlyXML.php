<?php
session_start();

$domtree = new DOMDocument('1.0', 'UTF-8');
// create a DOM document with encoding utf8 - necessary for simpleXML function  

require_once "../connect.php";

$sql_All = "SELECT Filenames.filename, Galleries.gallery, Captions.caption, TextContents.textContent, AboutContents.aboutContent, CopyrightDates.copyrightDate, Locations.location, SourceOrganisations.sourceOrganisation, SortOrder.sortOrderID FROM ((((((((
Filenames
INNER JOIN Galleries ON Filenames.filenameID_pk = Galleries.filenameID_fk)
INNER JOIN Captions ON Filenames.filenameID_pk = Captions.filenameID_fk)
INNER JOIN TextContents ON Filenames.filenameID_pk = TextContents.filenameID_fk)
INNER JOIN AboutContents ON Filenames.filenameID_pk = AboutContents.filenameID_fk)
INNER JOIN CopyrightDates ON Filenames.filenameID_pk = CopyrightDates.filenameID_fk)
INNER JOIN Locations ON Filenames.filenameID_pk = Locations.filenameID_fk)
INNER JOIN SourceOrganisations ON Filenames.filenameID_pk = SourceOrganisations.filenameID_fk)
INNER JOIN SortOrder ON Filenames.filenameID_pk = SortOrder.sortOrderID) ORDER BY SortOrder.sortOrder_pk";

// get gallery folder name from the session and create path for main folder
$pathMainImage = "../images/" . $_SESSION['nameOfFolder'] . "/";

//echo "this is the path: " . $pathMainImage;  

// get gallery folder name from the session and create path for the thumbnail folder
$pathThumbImage = "../images/" . $_SESSION['nameOfFolder'] . "/thumbs/";

//echo "this is the path: " . $pathThumbImage;  

// create the root element of the xml tree 
    $xmlRoot = $domtree->createElement("juiceboxgallery");

// append it to the document created 
    $xmlRoot = $domtree->appendChild($xmlRoot);

   foreach ($result=$conn->query($sql_All) as $row)
{

   // build image node with the various attributes needed for juicebox
    $image = $domtree->createElement("image");
    $image = $domtree->appendChild($image);
        $imageURL = $domtree->createAttribute("imageURL");
        $imageURL->value = $pathMainImage.$row['filename'];
        $image->appendChild($imageURL);
            $thumbURL = $domtree->createAttribute("thumbURL");
            $thumbURL->value = $pathThumbImage.$row['filename'];
            $image->appendChild($thumbURL);  
                $linkURL = $domtree->createAttribute("linkURL");
                $linkURL->value = "#";
                $image->appendChild($linkURL); 
                    $linkTarget = $domtree->createAttribute("linkTarget");
                    $linkTarget->value = "_blank";
                    $image->appendChild($linkTarget); 

	$image->appendChild($domtree->createElement('title',' '));
	$image->appendChild($domtree->createElement('caption', $row['caption']));
	$image->appendChild($domtree->createElement('about', $row['aboutContent']));
	$image->appendChild($domtree->createElement('text', $row['textContent']));
	$image->appendChild($domtree->createElement('copyrightYear', $row['copyrightDate']));
	$image->appendChild($domtree->createElement('locationCreated', $row['location']));	
	$image->appendChild($domtree->createElement('sourceOrganisation', $row['sourceOrganisation']));	

    $xmlRoot->appendChild($image);
}

// retrieve the name of the folder from the saved session to configure where the config.xml file gets saved and print / save the XML file

    $domtree->formatOutput = TRUE;
    print $domtree->saveXML();
	$domtree->save("../../" . $_SESSION['nameOfFolder'] .'/configNew.xml');

?>