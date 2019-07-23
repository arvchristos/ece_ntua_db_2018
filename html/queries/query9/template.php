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

$_dbSQLquery = 'SELECT vehicles.store_id ,vehicles.plate, vehicles.veh_type,vehicles.brand,bookings.booking_id, bookings.start_date, bookings.end_date, bookings.pay_date , bookings.afm, datediff( bookings.start_date, CURDATE()) as remaining
FROM vehicles
JOIN bookings ON vehicles.plate = bookings.plate AND bookings.start_date >= CURDATE() AND (SELECT COUNT(*) FROM rents WHERE rents.booking_id = bookings.booking_id ) =0
ORDER BY remaining

';   // This is the query to be shown

$_dbtable = '';
 ?>
