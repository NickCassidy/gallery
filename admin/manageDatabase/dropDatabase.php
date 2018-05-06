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
        <h1>Drop Database</h1>
<?php

require_once "../webConfig.php";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql_dropTables = "DROP TABLE Filenames, Statuses, Galleries, Titles, Captions, TextContents, AboutContents, CopyrightDates, Locations, SourceOrganisations";
    $conn->exec($sql_dropTables);
    echo "<p>The database has been deleted</p>";  

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

 <a href="generateTables.php"><button class="ml4 js-serialize-button button navy bg-white">Generate tables</button></a>
        </div>
</body>
</html>