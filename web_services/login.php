<?php
session_start();
include 'dbconfig.php';
$emp_id = $_POST['emp_id'];
$password = $_POST['password'];
if(isset($_POST['submit']))
{
  session_start();
     if(!empty($_POST['emp_id'])) {
       $query = mysqli_query($conn,"SELECT * FROM login_table where emp_id = '$_POST[emp_id]' AND password = '$_POST[password]'") or die(mysqli_error($conn));
        $rows = mysqli_num_rows($query);
        $sql = mysqli_query($conn,"call designation('$emp_id')") or die(mysqli_error($conn));
        while ($result = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
          $role = $result['designation'];
          if($role == 'admin')
          {
            $link = '../index.php';
          }
          elseif ($role=='manager') {
            $link = '../manager_dash';
          }
          elseif ($role=='employee') {
            $link = '../employee_dash';
          }
          else {
            $link = '../login_form.php';

          }
        }
        if ($rows == 1) {
        $_SESSION['emp_id']=$_POST['emp_id'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['role'] = $role;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (10*60);
        //$query = mysqli_query("INSERT INTO logs_table(emp_id,module_name,module_description) VALUES('$emp_id','$role',Logged in)");
        header("location: ".$link."");
        exit();
        } else {
          echo "<script language=\"JavaScript\">\n";
    echo "alert('Username or Password was incorrect!');\n";
    echo "window.location='../login_form.php'";
    echo "</script>";
    exit();
        }
       }
}
?>
