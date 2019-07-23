<?php
//configuration file
//login to database
/*
You should change definitions on template.php and
edit pages: update.php
*/

$_dbhost = 'localhost';
$_dbname = 'id4147015_project';
$_dbusername = 'id4147015_ymanos';
$_dbpassword = 'lavg6g414';
$_databasefile = 'getdata.php';

$_dbSQLquery = 'SELECT DISTINCT vehicles.plate,vehicles.veh_type, (SELECT COUNT(*) FROM bookings WHERE bookings.plate = vehicles.plate) as total_bookings
FROM vehicles, bookings
WHERE (SELECT COUNT(*) FROM bookings WHERE bookings.plate = vehicles.plate) > 2
';   // This is the query to be shown

$_dbtable = '';
 ?>
