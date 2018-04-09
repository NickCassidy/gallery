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

/*    $sql_Filenames = "SELECT filename,lastUpdated FROM Filenames WHERE filenameID_pk=1";  */

/*   $sql_Filenames = "SELECT Filenames.filename, Filenames.isThumbnail, Filenames.lastUpdated FROM Filenames INNER JOIN Galleries ON Filenames.filenameID_pk = Galleries.filenameID_fk LIMIT 1"; 

   $sql_Galleries = "SELECT Galleries.gallery FROM Galleries INNER JOIN Filenames ON Filenames.filenameID_pk = Galleries.filenameID_fk LIMIT 1";
*/
// TRY THIS ... 

   $sql_All = "SELECT Filenames.filename, Galleries.gallery, Captions.caption, Titles.title FROM Filenames, Galleries, Captions, Titles WHERE filenameID_pk = filenameID_fk ORDER BY Filenames.filename LIMIT 1";


   foreach ($result=$conn->query($sql_Filenames) as $row)
{
echo $row['filename']. "<br><br>";
echo $row['gallery']."<br><br>";
}

   foreach ($result=$conn->query($sql_Galleries) as $row)
{
echo $row['gallery']. "<br><br>";
}

   foreach ($result=$conn->query($sql_All) as $row)
{
echo $row['gallery']. "<br><br>";
echo $row['filename']. "<br><br>";
echo $row['caption']. "<br><br>";
echo $row['title']. "<br><br>";
}

}



catch(PDOException $e)
    {
    echo $sql_Filenames . "<br>" . $e->getMessage();
	}



?>

