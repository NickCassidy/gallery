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
    $sql_Filenames = "INSERT INTO Filenames (filename, isThumbnail) VALUES ('$_GET[filename]','$_GET[isThumbnail]')";
    $sql_Galleries = "INSERT INTO Galleries (gallery) VALUES ('$_GET[gallery]')";
    $sql_Captions = "INSERT INTO Captions (caption) VALUES ('$_GET[caption]')";
    $sql_AboutContents = "INSERT INTO AboutContents (aboutContent) VALUES ('$_GET[aboutContent]')";
    $sql_TextContents = "INSERT INTO TextContents (textContent) VALUES ('$_GET[textContent]')";
    $sql_FirstCopyrightDates = "INSERT INTO FirstCopyrightDates (firstCopyrightDate) VALUES ('$_GET[firstCopyrightDate]')";
    $sql_SecondCopyrightDates = "INSERT INTO SecondCopyrightDates (secondCopyrightDate) VALUES ('$_GET[secondCopyrightDate]')";
    $sql_ThirdCopyrightDates = "INSERT INTO ThirdCopyrightDates (thirdCopyrightDate) VALUES ('$_GET[thirdCopyrightDate]')";
    $sql_FirstLocations = "INSERT INTO FirstLocations (firstLocation) VALUES ('$_GET[firstLocation]')";
    $sql_SecondLocations = "INSERT INTO SecondLocations (secondLocation) VALUES ('$_GET[secondLocation]')";
    $sql_FirstSourceOrganisations = "INSERT INTO FirstSourceOrganisations (firstSourceOrganisation) VALUES ('$_GET[firstSourceOrganisation]')";
    $sql_SecondSourceOrganisations = "INSERT INTO SecondSourceOrganisations (secondSourceOrganisation) VALUES ('$_GET[secondSourceOrganisation]')";
    $sql_ThirdSourceOrganisations = "INSERT INTO ThirdSourceOrganisations (thirdSourceOrganisation) VALUES ('$_GET[thirdSourceOrganisation]')";
    

    $conn->query($sql_Filenames);

    // get primary key ID of filename just added into filenames table
    $filenameID_pk = $conn->lastInsertId();


    $conn->query($sql_Galleries);
    $conn->query("INSERT INTO Galleries (filenameID_fk) VALUES (\".$filenameID_pk.\")");
    
    // set filename primary key as captions foreign key and ditto for remaining tables 
    $conn->query("INSERT INTO Captions (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_AboutContents);
    $conn->query("INSERT INTO AboutContents (filenameID_fk) VALUES (\".$filenameID_pk.\")");
    
    $conn->query($sql_TextContents);
    $conn->query("INSERT INTO TextContents (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_FirstCopyrightDates);
    $conn->query("INSERT INTO FirstCopyrightDates (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_SecondCopyrightDates);
    $conn->query("INSERT INTO SecondCopyrightDates (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_ThirdCopyrightDates);
    $conn->query("INSERT INTO ThirdCopyrightDates (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_FirstLocations);
    $conn->query("INSERT INTO FirstLocations (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_SecondLocations);
    $conn->query("INSERT INTO SecondLocations (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_FirstSourceOrganisations);
    $conn->query("INSERT INTO FirstSourceOrganisations (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_SecondSourceOrganisations);
    $conn->query("INSERT INTO SecondSourceOrganisations (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    $conn->query($sql_ThirdSourceOrganisations);
    $conn->query("INSERT INTO ThirdSourceOrganisations (filenameID_fk) VALUES (\".$filenameID_pk.\")");

    }
catch(PDOException $e)
    {
    echo $sql_Filenames . "<br>" . $e->getMessage();
    echo $sql_Galleries . "<br>" . $e->getMessage();
    echo $sql_Captions . "<br>" . $e->getMessage();
    echo $sql_AboutContents . "<br>" . $e->getMessage();
    echo $sql_TextContents . "<br>" . $e->getMessage();
    echo $sql_FirstCopyrightDates . "<br>" . $e->getMessage();
    echo $sql_SecondCopyrightDates . "<br>" . $e->getMessage();
    echo $sql_ThirdCopyrightDates . "<br>" . $e->getMessage();
    echo $sql_FirstLocations . "<br>" . $e->getMessage();
    echo $sql_SecondLocations . "<br>" . $e->getMessage();
    echo $sql_FirstSourceOrganisations . "<br>" . $e->getMessage();
    echo $sql_SecondSourceOrganisations . "<br>" . $e->getMessage();
    echo $sql_ThirdSourceOrganisations . "<br>" . $e->getMessage();
    }

require_once "submissionSuccess.php"; 

?>