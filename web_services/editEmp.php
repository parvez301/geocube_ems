<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  ob_start();
$date =$_POST['hid'];
$dateTime = new DateTime($date);
$formatted_joining_date=date_format ( $dateTime, 'Y-m-d' );
$values = array(
"jsonFirstName" =>        $_POST['fname'],
"jsonMiddleName" =>       $_POST['mname'],
"jsonLastName" =>         $_POST['lname'],
"jsonGender"   =>         $_POST['gender'],
"jsonAddress" =>          $_POST['add'],
"jsonUpdatedOn" =>        date("Y-m-d"),
"jsonCountryCode" =>      $_POST['country_code'],
"jsonContactNumber" =>    $_POST['cno'],
"jsonAccountNumber"=>     $_POST['ano'],
"jsonIfscCode"    =>      $_POST['ifsc'],
"jsonDepartmentId" =>     $_POST['did'],
"jsonProjectId"    =>     $_POST['pid'],
"jsonJoiningDate" =>      $formatted_joining_date,
"jsonMartialStatus"=>     $_POST['martial_status']
);
$json_obj = json_encode($values);
$result = json_decode($json_obj);
$emp_first_name = $result -> jsonFirstName;
$emp_middle_name = $result -> jsonMiddleName;
$emp_last_name = $result -> jsonLastName;
$emp_gender = $result -> jsonGender;
$emp_address = $result -> jsonAddress;
 $photo_file = $_FILES['photo']['name'];
  $resume_file = $_FILES['resume']['name'];
  $emp_photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
  $emp_resume = addslashes(file_get_contents($_FILES['resume']['tmp_name']));
  $inputPhotoName = $photo_file;
  $inputResumeName = $resume_file;
  $photo_ext = pathinfo($inputPhotoName, PATHINFO_EXTENSION);
  $resume_ext = pathinfo($inputResumeName,PATHINFO_EXTENSION);
  if($photo_ext != "jpg" && $photo_ext != "jpeg" && $photo_ext!= "png") {
    echo "Sorry, only jpg,jpeg, png files are allowed for photo.";
}
   if($resume_ext != "doc" && $resume_ext != "docx" && $resume_ext!= "pdf") {
    echo "Sorry, only doc,docx, pdf files are allowed for resume.";
}
if ($_FILES["photo"]["size"] > 500000 ) {
    echo "Sorry, your file is too large.";
}
if ($_FILES["resume"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
}

$enabled_flag = true;
$updated_on = $result -> jsonUpdatedOn;;
$country_code = $result -> jsonCountryCode;
$emp_contact_number = $result -> jsonContactNumber;
$emp_account_number = $result -> jsonAccountNumber;
$ifsc_code = $result -> jsonIfscCode;
$dept_id   =$result -> jsonDepartmentId;
$project_id = $result-> jsonProjectId;
$joining_date = $result -> jsonJoiningDate;
$martial_status = $result -> jsonMartialStatus;
$sql = ("CALL updateEmployee('".$_GET[edit_id]."','$emp_first_name','$emp_middle_name','$emp_last_name','$emp_gender','$emp_address',$country_code,'$emp_contact_number','$emp_account_number','$ifsc_code','$dept_id','$project_id','$joining_date','$martial_status')");
$result = mysqli_query($conn,$sql);
if($result)
{
  echo "<script language=\"JavaScript\">\n";
echo "alert('Edit Successfull');\n";
echo "window.location='index.php'";
echo "</script>";
}
else {
  $message = "Error found";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
mysqli_free_result($sql);
mysqli_next_result($conn);
}
 ?>