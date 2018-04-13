<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SimonSite";
$port= "8888";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



echo $numRowsInTable;


// set initial value for counter
    $i = 0;

    $totalNumberOfImages = 1;

// Formatting for json script

print "                     {\n";   

print "                     \"@context\":\"http://schema.org\",\n";

print "                     \"@graph\":\n";

print "                          [\n";

print "                             {\n"; 


$sql_All = "SELECT filename, gallery, caption, textContent, aboutContent, copyrightDate, location, sourceOrganisation FROM Filenames, Galleries, Captions, TextContents, AboutContents, CopyrightDates, Locations, SourceOrganisations WHERE Filenames.filenameID_pk = Captions.filenameID_fk AND Filenames.filenameID_pk = AboutContents.filenameID_fk AND Filenames.filenameID_pk = Galleries.filenameID_fk AND Filenames.filenameID_pk = TextContents.filenameID_fk AND Filenames.filenameID_pk = CopyrightDates.filenameID_fk AND Filenames.filenameID_pk = Locations.filenameID_fk AND Filenames.filenameID_pk = SourceOrganisations.filenameID_fk";


   foreach ($result=$conn->query($sql_All) as $row)
{

$copyrightHolder_creator_editor = "Simon Turtle";

$familyFriendly = "true";



        // increment counter on each loop 
        ++$i; 


        if ($i == 1) 
        {

print "";
        }

        elseif ($i > 1) 
        {

print "                             {\n";
        }

print "                               \"@type\":\"Photograph\",\n";
        
print "                               \"about\":\"" . $row['aboutContent'] . "\",\n"; 

print "                               \"caption\":\"" . $row['caption'] . "\",\n";

print "                               \"text\":\"" . $row['textContent'] . "\",\n";

print "                               \"creator\":\"$copyrightHolder_creator_editor\",\n";

print "                               \"copyrightYear\":\"" . $row['copyrightDate'] . "\",\n";

print "                               \"copyrightHolder\":\"$copyrightHolder_creator_editor\",\n";

print "                               \"isFamilyFriendly\":\"$familyFriendly\",\n";

print "                               \"editor\":\"$copyrightHolder_creator_editor\",\n";

print "                               \"locationCreated\":\"" . $row['location'] . "\",\n";

print "                               \"sourceOrganization\":\"" . $row['sourceOrganisation'] . "\",\n";

print "                               \"thumbnailURL\":\"" . $row['filename'] . "\",\n";

print "                               \"url\":\"" . $row['filename'] . "\"\n";


        if ($i < $totalNumberOfImages) 
        {

print "                             },\n";
        }

        elseif ($i == $totalNumberOfImages) 
        {

print "                             }\n";
        }

    

print "                          ]\n";

print "                      }\n";




}
}

catch(PDOException $e)
    {
    echo $sql_All . "<br>" . $e->getMessage();
	}

?>

