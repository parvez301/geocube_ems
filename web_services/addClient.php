<?php
include 'dbconfig.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $values = array(
  "jsonClientName" => $_POST['client_name'],
  "jsonClientEmail" => $_POST['client_email'],
  "jsonClientAddress" => $_POST['client_address'],
  "jsonClientContactReference" => $_POST['client_contact_reference'],
  "jsonCreatedOn" => date("Y-m-d"),
  "jsonUpdatedOn" => date("Y-m-d")
);
$json_obj = json_encode($values);
$result = json_decode($json_obj);
$client_name = $result -> jsonClientName;
$client_email = $result -> jsonClientEmail;
$client_address = $result -> jsonClientAddress;
$client_contact_reference= $result -> jsonClientContactReference;
$client_contact_reference_2 = $result -> jsonClientContactReference2;
$enabled_flag = 1;
$created_on = $result -> jsonCreatedOn;
$updated_on = $result -> jsonUpdatedOn;

$sql = mysqli_query($conn,"call insertClient('$client_name','$client_email','$client_address','$client_contact_reference','$enabled_flag','$created_on','$updated_on')");
if(!$sql)
{
  die('error found: '.mysqli_error());
}
else {
  header('location:../index.php');
}
}
 ?>
