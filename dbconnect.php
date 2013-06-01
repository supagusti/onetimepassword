<?php
$con = mysql_connect("localhost", "dbusername","dbpassword");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db("mysqldb") or die ("Die Datenbank existiert nicht.");
        

?>

