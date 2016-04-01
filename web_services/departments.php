<?php
include 'dbconfig.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $values = array(
  "jsonDepartmentName" => $_POST['department_name'],
  "jsonCreatedOn" => date("Y-m-d"),
  "jsonUpdatedOn" => date("Y-m-d")
);
$json_obj = json_encode($values);
$result = json_decode($json_obj);
$d_name = $result -> jsonDepartmentName;
//$hod_id = $result -> jsonHodId;
$created_on = $result -> jsonCreatedOn;
$updated_on = $result -> jsonUpdatedOn;
$enabled_flag = 1;
$hod_id = '';
$sql = mysqli_query($conn,"call insertDepartment('$d_name','$hod_id','$created_on','$updated_on','$enabled_flag')");
if(!$sql)
{
  die('error found: '.mysqli_error());
}
else {
  header('location: ../index.php');
}
}
 ?>
