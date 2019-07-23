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

$_dbSQLquery = 'SELECT SUM(stores.car) as cars_owned , SUM(stores.motorcycle) as motorcycle_owned , SUM(stores.atv) as atv_owned , SUM(stores.truck) as truck_owned , SUM(stores.mini_van) as mini_van_owned , SUM(stores.car+stores.motorcycle+stores.atv+stores.truck+stores.mini_van) as Total_vehicles_owned
FROM stores;
';   // This is the query to be shown

$_dbtable = '';
 ?>
