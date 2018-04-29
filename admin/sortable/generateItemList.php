<?php

require_once "../connect.php";

// Code to generate list of available uploaded photos for selection & sorting 

$sql_All = "SELECT filenameID_pk, filename FROM Filenames";

   foreach ($result=$conn->query($sql_All) as $row)

{

print ' <li class="p1 mb1 yellow bg-maroon" style="position: relative; z-index: 10">' .$row['filenameID_pk']. ' || ' .$row['filename']. '</li>';
}

?>

