<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystem";

//Connection to database
$conn = mysqli_connect($servername, $dBUsername,$dBPassword,$dBName);

//Kill if connection fails and pass error
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}