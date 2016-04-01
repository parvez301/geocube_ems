<?php
include 'dbconfig.php';
$date =$_POST['project_start_date'];
$dateTime = new DateTime($date);
$formatted_project_start_date=date_format ( $dateTime, 'Y-m-d' );
$date =$_POST['project_end_date'];
$dateTime = new DateTime($date);
$formatted_project_end_date=date_format ( $dateTime, 'Y-m-d' );
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $values = array(
  "jsonProjectName" => $_POST['project_name'],
  "jsonProjectDescription" =>$_POST['project_description'],
  "jsonProjectStartDate" => $formatted_project_start_date,
  "jsonProjectEndDate"  => $formatted_project_end_date,
  "jsonCliendId"  => $_POST['cid'],
  "jsonDepartmentId"=>$_POST['did'],
  "jsonCreatedOn" => date("Y-m-d"),
  "jsonUpdatedOn" => date("Y-m-d")
);
$json_obj = json_encode($values);
$result = json_decode($json_obj);
$project_name = $result -> jsonProjectName;
$project_description = $result -> jsonProjectDescription;
$project_start_date = $result -> jsonProjectStartDate;
$project_end_date = $result -> jsonProjectEndDate;
$client_id = $result -> jsonCliendId;
$dept_id = $result -> jsonDepartmentId;
$created_on = $result -> jsonCreatedOn;
$updated_on = $result -> jsonUpdatedOn;
$enabled_flag = 1;
$sql = mysqli_query($conn,"call insertProject('$project_name','$project_description ','$enabled_flag','$project_start_date','$project_end_date','$client_id','$created_on','$updated_on','$dept_id')");
if(!$sql)
{
  die('error found: '.mysqli_error());
}
else {
  header('location: ../index.php');
}
}
 ?>
