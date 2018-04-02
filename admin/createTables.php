<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "SimonSite";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Create Filenames table
    $sql_Create_Filenames_Table = "CREATE TABLE Filenames (
    filenameID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(500) NOT NULL,
    isThumbnail ENUM('1','0') NOT NULL,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_Filenames_Table);
    echo "The Filenames table was created successfully\n";
    echo "<br>";

    // Create Galleries table
    $sql_Create_Galleries_Table = "CREATE TABLE Galleries (
    galleryID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gallery VARCHAR(25) NOT NULL,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_Galleries_Table);
    echo "The Galleries table was created successfully\n";
    echo "<br>";

    // Create Titles table
    $sql_Create_Titles_Table = "CREATE TABLE Titles (
    titleID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title TEXT NULL,
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_Titles_Table);
    echo "Titles table created successfully\n";
    echo "<br>";

    // Create Captions table
    $sql_Create_Captions_Table = "CREATE TABLE Captions (
    captionID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    caption TEXT NULL,
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_Captions_Table);
    echo "The Captions table was created successfully\n";
    echo "<br>";

    // Create TextContent table
    $sql_Create_JSONText_Table = "CREATE TABLE TextContents (
    textContentID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    textContent TEXT NULL,
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONText_Table);
    echo "The TextContents table was created successfully\n";
    echo "<br>";

    // Create AboutContent table
    $sql_Create_JSONAbout_Table = "CREATE TABLE AboutContents (
    aboutID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    aboutContent TEXT NULL,
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONAbout_Table);
    echo "The AboutContent table was created successfully\n";
    echo "<br>";

    // Create firstCopyrightDate table
    $sql_Create_JSONFirstCopyrightDate_Table = "CREATE TABLE FirstCopyrightDates (
    firstCopyrightDateID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstCopyrightDate INT(4),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONFirstCopyrightDate_Table);
    echo "The firstCopyrightDates table was created successfully";
    echo "<br>";

    // Create secondCopyrightDate table
    $sql_Create_JSONSecondCopyrightDate_Table = "CREATE TABLE SecondCopyrightDates (
    secondCopyrightDateID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secondCopyrightDate INT(4),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONSecondCopyrightDate_Table);
    echo "The secondCopyrightDates table was created successfully";
    echo "<br>";

    // Create thirdCopyrightDates table
    $sql_Create_JSONThirdCopyrightDate_Table = "CREATE TABLE ThirdCopyrightDates (
    thirdCopyrightDateID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    thirdCopyrightDate INT(4),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONThirdCopyrightDate_Table);
    echo "The thirdCopyrightDates table was created successfully";
    echo "<br>";

    // Create firstLocations table
    $sql_Create_JSONFirstLocations_Table = "CREATE TABLE FirstLocations (
    firstLocationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstLocation VARCHAR(255),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONFirstLocations_Table);
    echo "The firstLocations table was created successfully";
    echo "<br>";

    // Create secondLocations table
    $sql_Create_JSONSecondLocations_Table = "CREATE TABLE SecondLocations (
    secondLocationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secondLocation VARCHAR(255),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONSecondLocations_Table);
    echo "The secondLocations table was created successfully";
    echo "<br>";

	// Create firstSourceOrganisations table
    $sql_Create_JSONFirstSourceOrganisation_Table = "CREATE TABLE FirstSourceOrganisations (
    firstSourceOrganisationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstSourceOrganisation VARCHAR(255),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONFirstSourceOrganisation_Table);
    echo "The firstSourceOrganisations table was created successfully";
    echo "<br>";

	// Create secondSourceOrganisations table
    $sql_Create_JSONSecondSourceOrganisation_Table = "CREATE TABLE SecondSourceOrganisations (
    secondSourceOrganisationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    secondSourceOrganisation VARCHAR(255),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONSecondSourceOrganisation_Table);
    echo "The secondSourceOrganisations table was created successfully";
    echo "<br>";

	// Create thirdSourceOrganisations table
    $sql_Create_JSONThirdSourceOrganisation_Table = "CREATE TABLE ThirdSourceOrganisations (
    thirdSourceOrganisationID_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    thirdSourceOrganisation VARCHAR(255),
    filenameID_fk INT,
    lastUpdated TIMESTAMP    
    )";
    // use exec() because no results are returned
    $conn->exec($sql_Create_JSONThirdSourceOrganisation_Table);
    echo "The thirdSourceOrganisations table was created successfully";
    }
catch(PDOException $e)
    {
    echo $sql_Create_Filenames_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Galleries_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Titles_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_Captions_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONAbout_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONText_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONFirstCopyrightDate_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONSecondCopyrightDate_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONThirdCopyrightDate_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONFirstLocations_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONSecondLocations_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONFirstSourceOrganisation_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONSecondSourceOrganisation_Table . "<br>" . $e->getMessage()."\n";
    echo $sql_Create_JSONThirdSourceOrganisation_Table . "<br>" . $e->getMessage()."\n";
    }

$conn = null; 
?>