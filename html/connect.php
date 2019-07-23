<?php
$connection = mysqli_connect('localhost', 'id4147015_ymanos', 'lavg6g414');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'id4147015_project');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
