<?php
$xml=simplexml_load_file("config.xml") or die("Error: Cannot create object");
print_r($xml);
?>