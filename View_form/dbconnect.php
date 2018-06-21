<?php
         $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db   = mysqli_connect($dbhost, $dbuser, $dbpass,"admission_system");
if (!$db) {
    die('Could not connect: '.mysql_error());
}

    
 ?>