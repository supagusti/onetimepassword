<?php

$file = 'include/counter.txt';
// Open the file to get existing content
$counter = file_get_contents($file);

if ($_COOKIE["onetimepassword"] !== "counterSet")
{
$counter = $counter + 1;
// Write the contents back to the file
file_put_contents($file, $counter);
// Set Cookie 3600s
$value = 'counterSet';
setcookie("onetimepassword", $value, time()+3600);
}

ECHO "</br><p>You are the <b>".$counter.".</b> visitor on this site.</br>"

?>
