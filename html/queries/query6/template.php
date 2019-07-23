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

$_dbSQLquery = 'SELECT  MONTHNAME(bookings.start_date) AS month, COUNT(MONTH(bookings.start_date)) AS number_of_bookings
FROM bookings
GROUP BY MONTH(bookings.start_date)
';   // This is the query to be shown

$_dbtable = '';
 ?>
