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

   $sql_All = "SELECT Filenames.filename, Galleries.gallery, Captions.caption, AboutContents.aboutContent, TextContents.textContent, CopyrightDates.copyrightDate, Locations.location, SourceOrganisations.sourceOrganisation FROM Filenames, Galleries, Captions, AboutContents, TextContents, CopyrightDates, Locations, SourceOrganisations WHERE Filenames.filenameID_pk = Galleries.filenameID_fk LIMIT 1";


   foreach ($result=$conn->query($sql_All) as $row)
{
echo "Filename is: " . $row['filename']. "<br><br>";
echo "Gallery is: " . $row['gallery']. "<br><br>";
echo "Caption is:" . $row['caption']. "<br><br>";
echo "About content is:" . $row['aboutContent']. "<br><br>";
echo "Text is:" . $row['textContent']. "<br><br>";
echo "Copyright date(s) is/are:" . $row['copyrightDate']. "<br><br>";
echo "Location is:" . $row['location']. "<br><br>";
echo "Source organisation is:" . $row['sourceOrganisation']. "<br><br>";
}
}

catch(PDOException $e)
    {
    echo $sql_All . "<br>" . $e->getMessage();
	}

?>

