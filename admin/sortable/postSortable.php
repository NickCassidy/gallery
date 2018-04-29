<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="css/base.css">
</head>
<body>
<pre>

<?php 

require_once "../connect.php"; 

// clean old content from the table
$dropTable = "DROP TABLE IF EXISTS SortOrder";
$conn->exec($dropTable);

// Create SortOrder table
    $sql_Create_SortOrder_Table = "CREATE TABLE SortOrder (
    sortOrder_pk INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sortOrderID INT NOT NULL,
    filenameID_fk INT 
    )";
    $conn->exec($sql_Create_SortOrder_Table);
    echo "The SortOrder table was created successfully\n";
    echo "<br>";

// remove formating from $_POST sent from parent page
$ass = json_decode(file_get_contents('php://input'), true);

print_r($ass);

echo "</br>";

// get the number of nodes in the array 
$total = 0;

$total = $ass[0]['container']['itemCount'];

echo "There are ".$total. " nodes in the array </br></br>";

echo "The index has been increased by 1 so it matches the Filenames filenameID_pk value as the array counts from zero while SQL primary key counts from 1 </br></br>";

// iterate through the array and pass content to SortOrder table
for ( $row = 0; $row < $total; $row++ )
{	

// remove the <li> tags and styles that're applied by html5sortable - leaving this here for ref. I've now removed this in javascript in the sortable index.php page
// $html = strip_tags($ass[0]['items'][$row]['html']);
// html refers to the html node in the $_POST array, index refers to the item ID    

$html =  $ass[0]['items'][$row]['html'];

$index = $ass[0]['items'][$row]['index'];


// we're displaying the filename pk and filename in the generateitemlist on the sortable page. Need to strip off the filename so it doesn't end up in the table..
$html = substr($html,0,2);

echo $index.' and  '.$html."</br>";

// NB the $index array from $_POST counts from 0 and so, we need to add a '1' to it for it to match up with the Filenames filenameID_pk  
$sql = "INSERT INTO SortOrder (sortOrderID, filenameID_fk) VALUES ('$html', '$index'+1)";

$conn->exec($sql);

}

echo "<br>";
echo "The data has been inserted into the SortOrder table\n";

?>

</pre>

	<div id="formContainer">
		<a href="generateXML.php"><button class="ml4 js-serialize-button button navy bg-white">Generate XML</button></a>
	</div>
	<script>
		//window.stop()
	</script>
</body>
</html>