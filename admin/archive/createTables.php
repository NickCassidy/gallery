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

$sql_dropTables = "DROP TABLE Filenames, Galleries, Titles, Captions, TextContents, AboutContents, CopyrightDates, Locations, SourceOrganisations";
    $conn->exec($sql_dropTables);
    echo "The tables were dropped successfully\n";
    echo "<br>";

    // Create Filenames table
    $sql_Create_Filenames_Table = "CREATE TABLE Filenames (
    filenameID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(500) NOT NULL,
    lastUpdated TIMESTAMP 
    )";
    $conn->exec($sql_Create_Filenames_Table);
    echo "The Filenames table was created successfully\n";
    echo "<br>";

    
    // Create Galleries table
    $sql_Create_Galleries_Table = "CREATE TABLE Galleries (
    galleryID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gallery VARCHAR(25) NOT NULL,
    filenameID_fk INT  
    )";
    $conn->exec($sql_Create_Galleries_Table);
    echo "The Galleries table was created successfully\n";
    echo "<br>";

    
    // Create Titles table
    $sql_Create_Titles_Table = "CREATE TABLE Titles (
    titleID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title TEXT NULL,
    filenameID_fk INT   
    )";
    $conn->exec($sql_Create_Titles_Table);
    echo "The Titles table was created successfully\n";
    echo "<br>";

    
    // Create Captions table
    $sql_Create_Captions_Table = "CREATE TABLE Captions (
    captionID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    caption TEXT NULL,
    filenameID_fk INT   
    )";
    $conn->exec($sql_Create_Captions_Table);
    echo "The Captions table was created successfully\n";
    echo "<br>";


    // Create TextContent table
    $sql_Create_TextContents_Table = "CREATE TABLE TextContents (
    textContentID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    textContent TEXT NULL,
    filenameID_fk INT
    )";
    $conn->exec($sql_Create_TextContents_Table);
    echo "The Text_Contents table was created successfully\n";
    echo "<br>";


    // Create AboutContent table
    $sql_Create_AboutContents_Table = "CREATE TABLE AboutContents (
    aboutID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    aboutContent TEXT NULL,
    filenameID_fk INT 
    )";  
    $conn->exec($sql_Create_AboutContents_Table);
    echo "The AboutContents table was created successfully\n";
    echo "<br>";


    // Create CopyrightDates table
    $sql_Create_CopyrightDates_Table = "CREATE TABLE CopyrightDates (
    copyrightDateID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    copyrightDate VARCHAR(100),
    filenameID_fk INT
    )";
    $conn->exec($sql_Create_CopyrightDates_Table);
    echo "The CopyrightDates table was created successfully";
    echo "<br>";


    // Create Locations table
    $sql_Create_Locations_Table = "CREATE TABLE Locations (
    locationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255),
    filenameID_fk INT
    )";
    $conn->exec($sql_Create_Locations_Table);
    echo "The LocationsTable table was created successfully";
    echo "<br>";


	// Create SourceOrganisations table
    $sql_Create_SourceOrganisations_Table = "CREATE TABLE SourceOrganisations (
    sourceOrganisationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sourceOrganisation VARCHAR(255),
    filenameID_fk INT
    )";
    $conn->exec($sql_Create_SourceOrganisations_Table);
    echo "The SourceOrganisations table was created successfully";
    echo "<br>";


    }
catch(PDOException $e)
    {
    echo $sql_Create_Filenames_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Galleries_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Titles_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Captions_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_AboutContents_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_TextContents_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_CopyrightDates_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Locations_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_SourceOrganisations_Table . "<br>" . $e->getMessage()."\n";
    }

$conn = null; 
?>