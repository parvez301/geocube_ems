<?php
include 'dbconfig.php';
$date =$_POST['from_date'];
$dateTime = new DateTime($date);
$formatted_from_date=date_format ( $dateTime, 'Y-m-d' );
$date =$_POST['to_date'];
$dateTime = new DateTime($date);
$formatted_to_date=date_format ( $dateTime, 'Y-m-d' );
  $values = array(
  "jsonEmpId" => $_POST['eid'],
  "jsonFromDate" => $formatted_from_date,
  "jsonToDate"  => $formatted_to_date,
  "jsonHouseRentAllowance" =>$_POST['hra'],
  "jsonTravelAllowance"  => $_POST['ta'],
  "jsonDearlyAllowance"  => $_POST['da'],
  "jsonOtherAllowance"  => $_POST['other_allowance'],
  "jsonCreatedOn" => date("Y-m-d"),
  "jsonUpdatedOn" => date("Y-m-d")
);
$json_obj = json_encode($values);
$result = json_decode($json_obj);
$emp_id = $result -> jsonEmpId;
$from_date = $result -> jsonFromDate;
$to_date = $result -> jsonToDate;
$hra = $result -> jsonHouseRentAllowance;
$ta = $result -> jsonTravelAllowance;
$da = $result -> jsonTravelAllowance;
$oa = $result -> jsonOtherAllowance;
$created_on = $result -> jsonCreatedOn;
$updated_on = $result -> jsonUpdatedOn;
$enabled_flag = 1;
$sql = mysqli_query($conn,"call insertSalary('$emp_id','$from_date','$to_date','$hra','$ta','$da','$oa','$created_on','$updated_on','$enabled_flag')");
if(!$sql)
{
  die(mysqli_error($conn));
}
else {
  header("location : ../index.php");
}
?>
