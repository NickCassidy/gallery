<?php session_start(); 

require_once "webConfig.php";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sanitise form data 
    $sanitisedFilename = strip_tags($_GET[filename]);
    // Insert filename into DB
    $sql_Filename = "INSERT INTO Filenames (filename) VALUES ('$sanitisedFilename')";
        $conn->query($sql_Filename);

    // get primary key ID of filename that was just inserted into filenames table 
    $filenameID_pk = $conn->lastInsertId();

    // insert the value of the filename primary key into the foreign key field in each table - set default status as true ie value 1  
    $sql_Status = "INSERT INTO Statuses (status, filenameID_fk) VALUES (1, $filenameID_pk)";
        $conn->query($sql_Status);

    $sanitisedGallery = strip_tags($_SESSION['nameOfFolder']);
    // insert the value of the filename primary key into the foreign key field in each table  
    $sql_Gallery = "INSERT INTO Galleries (gallery, filenameID_fk) VALUES ('$sanitisedGallery', $filenameID_pk)";
        $conn->query($sql_Gallery);

    $sanitisedCaption = strip_tags($_GET[caption]);
    // need to escape apostrophes in words before post to DB else won't get recorded
    $sanitisedCaption = str_replace("'", "\'", $_GET[caption]);
    $sanitisedCaption = str_replace('"', '\"', $_GET[caption]);
    $sql_Caption = "INSERT INTO Captions (caption, filenameID_fk) VALUES ('$sanitisedCaption', $filenameID_pk)";
        $conn->query($sql_Caption);

    $sanitisedAboutContent = strip_tags($_GET[aboutContent]);
    $sanitisedAboutContent = str_replace("'", "\'", $_GET[aboutContent]);
    $sanitisedAboutContent = str_replace('"', '\"', $_GET[aboutContent]);    
    $sql_AboutContent = "INSERT INTO AboutContents (aboutContent, filenameID_fk) VALUES ('$sanitisedAboutContent', $filenameID_pk)";
        $conn->query($sql_AboutContent);

    $sanitisedTextContent = strip_tags($_GET[textContent]);
    $sanitisedTextContent = str_replace("'", "\'", $_GET[textContent]);
    $sanitisedTextContent = str_replace('"', '\"', $_GET[textContent]);    
    $sql_TextContent = "INSERT INTO TextContents (textContent, filenameID_fk) VALUES ('$sanitisedTextContent', $filenameID_pk)";
        $conn->query($sql_TextContent);

    // only show , between the dates if two dates are set    
    $sanitisedCopyrightDate1 = strip_tags($_GET[copyrightDate1]);
    $sanitisedCopyrightDate2 = strip_tags($_GET[copyrightDate2]);
    if ($sanitisedCopyrightDate2 && $sanitisedCopyrightDate2) 
    {
    $concatenatedCopyrightDate = $sanitisedCopyrightDate1. ", " . $sanitisedCopyrightDate2;        
    } 
    else 
    {
    $concatenatedCopyrightDate = $sanitisedCopyrightDate1;          
    }
 
    $sql_CopyrightDate = "INSERT INTO CopyrightDates (copyrightDate, filenameID_fk) VALUES ('$concatenatedCopyrightDate',$filenameID_pk)";
        $conn->query($sql_CopyrightDate);

    $sanitisedLocation = strip_tags($_GET[location]);
    $sanitisedLocation = str_replace("'", "\'", $_GET[location]);
    $sanitisedLocation = str_replace('"', '\"', $_GET[location]);    
    $sql_Location = "INSERT INTO Locations (location, filenameID_fk) VALUES ('$sanitisedLocation', $filenameID_pk)";
        $conn->query($sql_Location);

    $sanitisedSourceOrganisation = strip_tags($_GET[sourceOrganisation]);
    $sanitisedSourceOrganisation = str_replace("'", "\'", $_GET[sourceOrganisation]);
    $sanitisedSourceOrganisation = str_replace('"', '\"', $_GET[sourceOrganisation]);
    $sql_SourceOrganisation = "INSERT INTO SourceOrganisations (sourceOrganisation, filenameID_fk) VALUES ('$sanitisedSourceOrganisation', $filenameID_pk)";
        $conn->query($sql_SourceOrganisation);

    }
catch(PDOException $e)
    {

    echo "<script>";
    echo "alert(";    
    echo $sql_Filename . "<br>" . $e->getMessage();
    echo $sql_Status . "<br>" . $e->getMessage();
    echo $sql_Gallery . "<br>" . $e->getMessage();
    echo $sql_Caption . "<br>" . $e->getMessage();
    echo $sql_AboutContent . "<br>" . $e->getMessage();
    echo $sql_TextContent . "<br>" . $e->getMessage();
    echo $sql_CopyrightDate . "<br>" . $e->getMessage();
    echo $sql_Location . "<br>" . $e->getMessage();
    echo $sql_SourceOrganisation . "<br>" . $e->getMessage();
    echo ")";
    echo "</script>";
    }

echo "<script>location.href='sortable/index.php';</script>";

?>