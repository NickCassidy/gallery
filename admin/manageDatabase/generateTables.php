<!DOCTYPE html> 
<html lang="en">
<head>
		<link href="../dropzone/css/general.css" type="text/css" rel="stylesheet" />
      	<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin/>
      	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
      	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:700">
</head>	
<body>
        <div class="createTablesWrapper">
        <h1>Create Tables</h1>
<?php

require_once "../webConfig.php";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create Filenames table
    $sql_Create_Filenames_Table = "CREATE TABLE Filenames (
    filenameID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(500) NOT NULL,
    lastUpdated TIMESTAMP 
    )";
    $conn->exec($sql_Create_Filenames_Table);
    echo "<p>The Filenames table was created successfully</p>";
    
    // Create Status table
    $sql_Create_Statuses_Table = "CREATE TABLE Statuses (
    statusID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    status BOOLEAN NOT NULL DEFAULT 1,
    filenameID_fk INT NULL   
    )";
    $conn->exec($sql_Create_Statuses_Table);
    echo "<p>The Statuses table was created successfully</p>";

    // Create Galleries table
    $sql_Create_Galleries_Table = "CREATE TABLE Galleries (
    galleryID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gallery VARCHAR(25) NULL,
    filenameID_fk INT NULL  
    )";
    $conn->exec($sql_Create_Galleries_Table);
    echo "<p>The Galleries table was created successfully</p>";
    
    // Create Titles table
    $sql_Create_Titles_Table = "CREATE TABLE Titles (
    titleID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NULL,
    filenameID_fk INT NULL   
    )";
    $conn->exec($sql_Create_Titles_Table);
    echo "<p>The Titles table was created successfully</p>";
    
    // Create Captions table
    $sql_Create_Captions_Table = "CREATE TABLE Captions (
    captionID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    caption VARCHAR(500) NULL,
    filenameID_fk INT NULL   
    )";
    $conn->exec($sql_Create_Captions_Table);
    echo "<p>The Captions table was created successfully</p>";

    // Create TextContent table
    $sql_Create_TextContents_Table = "CREATE TABLE TextContents (
    textContentID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    textContent VARCHAR(250) NULL,
    filenameID_fk INT NULL
    )";
    $conn->exec($sql_Create_TextContents_Table);
    echo "<p>The Text_Contents table was created successfully</p>";

    // Create AboutContent table
    $sql_Create_AboutContents_Table = "CREATE TABLE AboutContents (
    aboutID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    aboutContent VARCHAR(500) NULL,
    filenameID_fk INT NULL
    )";  
    $conn->exec($sql_Create_AboutContents_Table);
    echo "<p>The AboutContents table was created successfully</p>";

    // Create CopyrightDates table
    $sql_Create_CopyrightDates_Table = "CREATE TABLE CopyrightDates (
    copyrightDateID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    copyrightDate VARCHAR(100) NULL,
    filenameID_fk INT NULL
    )";
    $conn->exec($sql_Create_CopyrightDates_Table);
    echo "<p>The CopyrightDates table was created successfully</p>";

    // Create Locations table
    $sql_Create_Locations_Table = "CREATE TABLE Locations (
    locationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255) NULL,
    filenameID_fk INT NULL
    )";
    $conn->exec($sql_Create_Locations_Table);
    echo "<p>The LocationsTable table was created successfully</p>";

	// Create SourceOrganisations table
    $sql_Create_SourceOrganisations_Table = "CREATE TABLE SourceOrganisations (
    sourceOrganisationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sourceOrganisation VARCHAR(255) NULL,
    filenameID_fk INT NULL
    )";
    $conn->exec($sql_Create_SourceOrganisations_Table);
    echo "<p>The SourceOrganisations table was created successfully</p>";

}
    
catch(PDOException $e)
    {    
    echo $sql_Create_Filenames_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Statuses_Table . "<br>" . $e->getMessage()."\n";
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

 <a href="../chooseGallery.php"><button class="ml4 js-serialize-button button navy bg-white">Start again</button></a>
        </div>
</body>
</html>