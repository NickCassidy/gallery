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

    // Insert filename 
    $sql_Filenames = "INSERT INTO Filenames (filename, isThumbnail) VALUES ('$_GET[filename]','$_GET[isThumbnail]')";
        $conn->query($sql_Filenames);

    // get primary key ID of filename that was just inserted into filenames table 
    $filenameID_pk = $conn->lastInsertId();

    // insert the value of the filename primary key into the foreign key field in each table  
    $sql_Galleries = "INSERT INTO Galleries (gallery, filenameID_fk) VALUES ('$_GET[gallery]', $filenameID_pk)";
        $conn->query($sql_Galleries);

    $sql_Captions = "INSERT INTO Captions (caption, filenameID_fk) VALUES ('$_GET[caption]', $filenameID_pk)";
        $conn->query($sql_Captions);

    $sql_AboutContents = "INSERT INTO AboutContents (aboutContent, filenameID_fk) VALUES ('$_GET[aboutContent]', $filenameID_pk)";
        $conn->query($sql_AboutContents);

    $sql_TextContents = "INSERT INTO TextContents (textContent, filenameID_fk) VALUES ('$_GET[textContent]', $filenameID_pk)";
        $conn->query($sql_TextContents);

    $sql_CopyrightDates = "INSERT INTO CopyrightDates (copyrightDate, filenameID_fk) VALUES ('$_GET[copyrightDate]',$filenameID_pk)";
        $conn->query($sql_CopyrightDates);

    $sql_Locations = "INSERT INTO Locations (location, filenameID_fk) VALUES ('$_GET[location]', $filenameID_pk)";
        $conn->query($sql_Locations);

    $sql_SourceOrganisations = "INSERT INTO SourceOrganisations (sourceOrganisation, filenameID_fk) VALUES ('$_GET[sourceOrganisation]', $filenameID_pk)";
        $conn->query($sql_SourceOrganisations);

    }
catch(PDOException $e)
    {
    echo $sql_Filenames . "<br>" . $e->getMessage();
    echo $sql_Galleries . "<br>" . $e->getMessage();
    echo $sql_Captions . "<br>" . $e->getMessage();
    echo $sql_AboutContents . "<br>" . $e->getMessage();
    echo $sql_TextContents . "<br>" . $e->getMessage();
    echo $sql_CopyrightDates . "<br>" . $e->getMessage();
    echo $sql_Locations . "<br>" . $e->getMessage();
    echo $sql_SourceOrganisations . "<br>" . $e->getMessage();
    }

require_once "retrievePosts.php"; 

?>