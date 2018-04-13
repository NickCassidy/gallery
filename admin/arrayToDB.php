<?php

if(is_array($records)){
    foreach ($records as $row) {
        $fieldVal1 = mysql_real_escape_string($records[$row][0]);
        $fieldVal2 = mysql_real_escape_string($records[$row][1]);
        $fieldVal3 = mysql_real_escape_string($records[$row][2]);
        $query ="INSERT INTO programming_lang (field1, field2, field3) VALUES ( '". $fieldVal1."','".$fieldVal2."','".$fieldVal3."' )";
        mysqli_query($conn, $query);
    }
}

?>