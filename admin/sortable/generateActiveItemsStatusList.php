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
// ref http://form.guide/php-form/php-form-checkbox.html
print ' <li class="getFileListItem" style="position: relative; z-index: 10">';
print '<label class="container">'.$row['filenameID_pk']. ' || '. $row["filename"].'<input type="checkbox" value="true" name="photoStatus['.$row['filenameID_pk'].']"><span class="checkmark"></span>';
print "<img src=". '../../images/' . $getFolderName . '/' .$row["filename"]. ' class="fileListItem">' .'</img></label>'; 
print '</li>';

}

?>

