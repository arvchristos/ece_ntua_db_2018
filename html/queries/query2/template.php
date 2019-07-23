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

$_dbSQLquery = 'SELECT stores.store_id,stores.town , employees.first_name , employees.last_name ,employees.afm,employees.d_license
FROM stores
INNER JOIN employees ON employees.position="ΟΔΗΓΟΣ" AND employees.store_id = stores.store_id

';   // This is the query to be shown

$_dbtable = '';
 ?>
