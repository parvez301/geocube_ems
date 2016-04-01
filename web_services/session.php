<?php
include 'dbconfig.php';
if(!isset($_SESSION))
    {
        session_start();
    }
$user_check=$_SESSION['emp_id'];
$ses_sql=mysqli_query($conn,"select emp_ref_table.emp_f_name from emp_ref_table where emp_ref_table.emp_id =$user_check") or die(mysqli_error($conn));
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session =$row['emp_f_name'];
if(!isset($login_session)){
header("location : ../login_form.php");
}