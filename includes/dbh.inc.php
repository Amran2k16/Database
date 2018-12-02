<?php 

$servername = 'mysql.cs.nott.ac.uk';
$username = 'psxma10';
$password = 'hello123';
$dbasename= 'psxma10';

// $conn = new mysqli($servername, $username, $password, $dbasename);

$conn = mysqli_connect($servername, $username, $password, $dbasename);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>