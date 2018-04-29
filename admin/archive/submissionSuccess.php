<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "SimonSite";
$port= "8888";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert filename 
    $sql_Filenames = "SELECT filename FROM Filenames ORDER BY lastUpdated DESC LIMIT 1"; 

    /* $sql_Captions = "SELECT * FROM Captions ORDER BY timestamp DESC LIMIT 1";
    $sql_AboutContents = "INSERT INTO AboutContents (aboutContent) VALUES ('$_GET[aboutContent]')";
    $sql_TextContents = "INSERT INTO TextContents (textContent) VALUES ('$_GET[textContent]')";
    $sql_FirstCopyrightDates = "INSERT INTO FirstCopyrightDates (firstCopyrightDate) VALUES ('$_GET[firstCopyrightDate]')";
    $sql_SecondCopyrightDates = "INSERT INTO SecondCopyrightDates (secondCopyrightDate) VALUES ('$_GET[secondCopyrightDate]')";
    $sql_ThirdCopyrightDates = "INSERT INTO ThirdCopyrightDates (thirdCopyrightDate) VALUES ('$_GET[thirdCopyrightDate]')";
    $sql_FirstLocations = "INSERT INTO FirstLocations (firstLocation) VALUES ('$_GET[firstLocation]')";
    $sql_SecondLocations = "INSERT INTO SecondLocations (secondLocation) VALUES ('$_GET[secondLocation]')";
    $sql_FirstSourceOrganisations = "INSERT INTO FirstSourceOrganisations (firstSourceOrganisation) VALUES ('$_GET[firstSourceOrganisation]')";
    $sql_SecondSourceOrganisations = "INSERT INTO SecondSourceOrganisations (secondSourceOrganisation) VALUES ('$_GET[secondSourceOrganisation]')";
    */
    // use exec() because no results are returned
    
    
    $rows = $conn->query ($sql_Filenames);

foreach ($rows as $row) {
echo "filename =" . $row["filename"] . "<br />";
}
    
    

//ob_start();

//$output =ob_get_clean();

   

    }
catch(PDOException $e)
    {
    echo "Error:" . "<br>" . $e->getMessage();
   
    }



?>