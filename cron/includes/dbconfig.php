<?php

/**
 * @Filename: dbconfig.php
 * @Description: Making a connection with database
 */

$host = "localhost";
$database = "wwwktown_ktownrooms";
$username = "wwwktown_ktown";
$password = "K703nR003$@123";

global $link;

$link = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}