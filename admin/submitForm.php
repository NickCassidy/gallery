<?php

require_once "webConfig.php";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sanitise form data 
    $sanitisedFilename = htmlspecialchars($_GET[filename]);
    // Insert filename into DB
    $sql_Filename = "INSERT INTO Filenames (filename) VALUES ('$sanitisedFilename')";
        $conn->query($sql_Filename);

    // get primary key ID of filename that was just inserted into filenames table 
    $filenameID_pk = $conn->lastInsertId();

    $sanitisedGallery = htmlspecialchars($_GET[gallery]);
    // insert the value of the filename primary key into the foreign key field in each table  
    $sql_Gallery = "INSERT INTO Galleries (gallery, filenameID_fk) VALUES ('$sanitisedGallery', $filenameID_pk)";
        $conn->query($sql_Gallery);

    $sanitisedCaption = htmlspecialchars($_GET[caption]);
    $sql_Caption = "INSERT INTO Captions (caption, filenameID_fk) VALUES ('$sanitisedCaption', $filenameID_pk)";
        $conn->query($sql_Caption);

    $sanitisedAboutContent = htmlspecialchars($_GET[aboutContent]);    
    $sql_AboutContent = "INSERT INTO AboutContents (aboutContent, filenameID_fk) VALUES ('$sanitisedAboutContent', $filenameID_pk)";
        $conn->query($sql_AboutContent);

    $sanitisedTextContent = htmlspecialchars($_GET[textContent]);    
    $sql_TextContent = "INSERT INTO TextContents (textContent, filenameID_fk) VALUES ('$sanitisedTextContent', $filenameID_pk)";
        $conn->query($sql_TextContent);

    $sanitisedCopyrightDate = htmlspecialchars($_GET[copyrightDate]);    
    $sql_CopyrightDate = "INSERT INTO CopyrightDates (copyrightDate, filenameID_fk) VALUES ('$sanitisedCopyrightDate',$filenameID_pk)";
        $conn->query($sql_CopyrightDate);

    $sanitisedLocation = htmlspecialchars($_GET[location]);    
    $sql_Location = "INSERT INTO Locations (location, filenameID_fk) VALUES ('$sanitisedLocation', $filenameID_pk)";
        $conn->query($sql_Location);

    $sanitisedSourceOrganisation = htmlspecialchars($_GET[sourceOrganisation]);
    $sql_SourceOrganisation = "INSERT INTO SourceOrganisations (sourceOrganisation, filenameID_fk) VALUES ('$sanitisedSourceOrganisation', $filenameID_pk)";
        $conn->query($sql_SourceOrganisation);

    }
catch(PDOException $e)
    {
    echo $sql_Filename . "<br>" . $e->getMessage();
    echo $sql_Gallery . "<br>" . $e->getMessage();
    echo $sql_Caption . "<br>" . $e->getMessage();
    echo $sql_AboutContent . "<br>" . $e->getMessage();
    echo $sql_TextContent . "<br>" . $e->getMessage();
    echo $sql_CopyrightDate . "<br>" . $e->getMessage();
    echo $sql_Location . "<br>" . $e->getMessage();
    echo $sql_SourceOrganisation . "<br>" . $e->getMessage();
    }

echo "<script>location.href='sortable/index.php';</script>";

?>