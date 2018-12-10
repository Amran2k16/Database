<?php 

// mersey connection
$servername = 'mysql.cs.nott.ac.uk';
$username = 'psxma10';
$password = 'hello123';
$dbasename= 'psxma10';

// $conn = new mysqli($servername, $username, $password, $dbasename);

// $conn = mysqli_connect($servername, $username, $password, $dbasename);


// connect to my local host
// $servername = '127.0.0.1';
// $username = 'amran';
// $password = 'hello123';
// $dbasename= 'databasemodule';

// $conn = mysqli_connect($servername, $username, $password, $dbasename);
$conn = new mysqli($servername, $username, $password, $dbasename);



if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>