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

$_dbSQLquery = 'SELECT vehicles.store_id,vehicles.plate,vehicles.veh_type,vehicles.brand,vehicles.kmeters FROM vehicles ORDER BY vehicles.kmeters;
';   // This is the query to be shown

$_dbtable = '';
 ?>
