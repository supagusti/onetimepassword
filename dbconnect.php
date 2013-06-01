<?php
$con = mysql_connect("localhost", "supagustisql4","'GX:?9pf/&ZKfA!Gl=yR5fOXznumdGI.");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db("supagustisql4") or die ("Die Datenbank existiert nicht.");
        

?>

