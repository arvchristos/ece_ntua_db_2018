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

$_dbSQLquery = 'SELECT stores.store_id,stores.town,vehicles.veh_type,vehicles.plate
FROM stores
LEFT JOIN vehicles ON stores.store_id = vehicles.store_id
ORDER BY store_id
';   // This is the query to be shown

$_dbtable = '';
 ?>
