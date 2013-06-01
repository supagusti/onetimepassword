<?php

//you need to modify this file to match your mysql configuration

$con = mysql_connect("localhost", "dbusername","dbpassword");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db("mysqldb") or die ("Die Datenbank existiert nicht.");
        

?>

