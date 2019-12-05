<?php


$host ="localhost"; //itcd4
$dbname= "bjexDB";
$username= "bjexDB";
$password= "";

//echo $_GET['keyword'];


//Establishing a connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
