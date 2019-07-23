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

$_dbSQLquery = 'SELECT store_id,plate,veh_type,brand,b_year,last_service,next_service, datediff( next_service, CURDATE()) as remaining FROM `vehicles` WHERE next_service >= CURDATE()
ORDER BY remaining
';   // This is the query to be shown

$_dbtable = '';
 ?>
