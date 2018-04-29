<?php

require_once "webConfig.php";

try {
    $conn = new PDO("mysql:dbname=$dbname; host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 	}
catch(PDOException $e)
    {
    echo $e->getMessage();
	}
?>