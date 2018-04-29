<?php

// create sortable list to be injected into sort.php (a jquery sortable list https://jqueryui.com/sortable/#default)

// name of directory where images will be pulled from
$directoryName = 'cow';

// scandir pull list of files from $directoryName into array
$files = scandir($directoryName);

// handle hidden files - search in $files array and then remove from array with unset 
if(($key = array_search('.', $files)) !== false) {
    unset($files[$key]);
}

if(($key = array_search('..', $files)) !== false) {
    unset($files[$key]);
}

if(($key = array_search('.DS_Store', $files)) !== false) {
    unset($files[$key]);
}

// reset array keys so they are consecutively numbered
$files = array_values($files);

// create a jquery sortable list 
echo '<ul id="sortable">';

// loop and echo list iterating through $files array
for ($i=0; $i<=10 ; $i++) 
{ 

echo '<li class="ui-state-default" id="item-' .$i .'"' .'><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>' . $files[$i] . $i .'</li>';
}

// end jquery sortable list
echo '</ul>';

?>

see https://goo.gl/CVrkeC 
http://jsfiddle.net/ryTsN/3296/