<!DOCTYPE html> 
<html lang="en">
<head>
	<link rel="stylesheet" href="sortable/css/base.css">
</head>
<body>					
	<div id="formContainer">
	<h1>Reset</h1>
		<a href="manageDatabase/dropDatabase.php"><button class="ml4 js-serialize-button button navy bg-white">Drop database</button></a>  
		<a href="manageDatabase/generateTables.php"><button class="ml4 js-serialize-button button navy bg-white">Reset tables</button></a>
        <p>This facility resets any current work underway to create a new config.xml file.<p> 
        <p>Any images / metadata you've already uploaded will remain.</p>
	</div>
	<script>
		window.stop()
	</script>
</body>
</html>