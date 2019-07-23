<?php
include 'config.php';
include 'template.php';

$sel = mysqli_query($con,$_dbSQLquery);
$data = array();

while ($row = $sel->fetch_array()) {
  $data[] = $row;
}
echo json_encode($data,JSON_NUMERIC_CHECK);
