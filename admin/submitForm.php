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

    $sql_FirstCopyrightDates = "INSERT INTO FirstCopyrightDates (firstCopyrightDate, filenameID_fk) VALUES ('$_GET[firstCopyrightDate]',$filenameID_pk)";
        $conn->query($sql_FirstCopyrightDates);

    $sql_SecondCopyrightDates = "INSERT INTO SecondCopyrightDates (secondCopyrightDate, filenameID_fk) VALUES ('$_GET[secondCopyrightDate]', $filenameID_pk)";
        $conn->query($sql_SecondCopyrightDates);

    $sql_ThirdCopyrightDates = "INSERT INTO ThirdCopyrightDates (thirdCopyrightDate, filenameID_fk) VALUES ('$_GET[thirdCopyrightDate]', $filenameID_pk)";
        $conn->query($sql_ThirdCopyrightDates);

    $sql_FirstLocations = "INSERT INTO FirstLocations (firstLocation, filenameID_fk) VALUES ('$_GET[firstLocation]', $filenameID_pk)";
        $conn->query($sql_FirstLocations);

    $sql_SecondLocations = "INSERT INTO SecondLocations (secondLocation, filenameID_fk) VALUES ('$_GET[secondLocation]', $filenameID_pk)";
        $conn->query($sql_SecondLocations);

    $sql_FirstSourceOrganisations = "INSERT INTO FirstSourceOrganisations (firstSourceOrganisation, filenameID_fk) VALUES ('$_GET[firstSourceOrganisation]', $filenameID_pk)";
        $conn->query($sql_FirstSourceOrganisations);

    $sql_SecondSourceOrganisations = "INSERT INTO SecondSourceOrganisations (secondSourceOrganisation, filenameID_fk) VALUES ('$_GET[secondSourceOrganisation]', $filenameID_pk )";
        $conn->query($sql_SecondSourceOrganisations);

    $sql_ThirdSourceOrganisations = "INSERT INTO ThirdSourceOrganisations (thirdSourceOrganisation, filenameID_fk) VALUES ('$_GET[thirdSourceOrganisation]', $filenameID_pk)";
        $conn->query($sql_ThirdSourceOrganisations);

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