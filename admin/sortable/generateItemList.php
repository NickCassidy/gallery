<?php session_start(); 

$getFolderName = $_SESSION['nameOfFolder'];

require_once "../connect.php";

// Generate list of photos in the $getFolderName directory that have status of 1 
$sql_All = "SELECT filenameID_pk, filename FROM ((Filenames  
INNER JOIN Galleries ON Filenames.filenameID_pk = Galleries.filenameID_fk)
INNER JOIN Statuses ON Filenames.filenameID_pk = Statuses.filenameID_fk)  
WHERE Statuses.status = 1 AND Galleries.gallery = '$getFolderName'"; 

   foreach ($result=$conn->query($sql_All) as $row)

{
print ' <li class="p1 mb1 yellow bg-maroon" style="position: relative; z-index: 10">' .$row['filenameID_pk']. ' || '. $row["filename"] . "<img src=". '../../images/' . $getFolderName . '/' .$row["filename"]. ' style="float:right; width:80px; border:1px solid black;">' .'</img>' . '</li>';
}

?>

