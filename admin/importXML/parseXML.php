<?php
$xml=simplexml_load_file("config.xml") or die("Error: Cannot create object");
print_r($xml);



if(is_array($xml)){
    foreach ($xml as $row) {
        $fieldVal1 = mysql_real_escape_string($xml[$row][0]);
        $fieldVal2 = mysql_real_escape_string($xml[$row][1]);
        $fieldVal3 = mysql_real_escape_string($xml[$row][2]);
        $fieldVal4 = mysql_real_escape_string($xml[$row][3]);
        $fieldVal5 = mysql_real_escape_string($xml[$row][4]);
        $fieldVal6 = mysql_real_escape_string($xml[$row][5]);
        $fieldVal7 = mysql_real_escape_string($xml[$row][6]);
        $fieldVal8 = mysql_real_escape_string($xml[$row][7]);
        $fieldVal9 = mysql_real_escape_string($xml[$row][8]);
        $fieldVal10 = mysql_real_escape_string($xml[$row][9]);
        $fieldVal11 = mysql_real_escape_string($xml[$row][10]);

        //$query ="INSERT INTO programming_lang (field1, field2, field3) VALUES ( '". $fieldVal1."','".$fieldVal2."','".$fieldVal3."' )";
        //mysqli_query($conn, $query);

        echo $fieldVal1; 
         echo $fieldVal2;
          echo $fieldVal3;  
    }
}

?>