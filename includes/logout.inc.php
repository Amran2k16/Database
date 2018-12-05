<?php

session_start();
session_unset(); //takes all session variables and removes all the values inside of them
session_destroy(); //destroy the session
header("Location: ../login.php")

?>