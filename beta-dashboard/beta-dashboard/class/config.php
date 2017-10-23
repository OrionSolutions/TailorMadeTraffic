<?php
########## MySql details (Replace with yours) #############
$username = "root"; //mysql username
$password = "";//mysql password
$hostname = "localhost"; //hostname
$databasename = 'medicalsystem'; //databasename

//connect to database
$mysqli = new mysqli($hostname, $username, $password, $databasename);

?>