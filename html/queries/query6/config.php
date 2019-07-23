<?php
include 'template.php';
$host = $_dbhost; /* Host name */
$user = $_dbusername; /* User */
$password = $_dbpassword; /* Password */
$dbname = $_dbname; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
