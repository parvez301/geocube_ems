
<?php
  include 'web_services/dbconfig.php';
  include 'web_services/session.php';
  $now = time();

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "<script language=\"JavaScript\">\n";
            echo "window.location='login_form.php'";
            echo "</script>";
        }
        else {
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
  <?php include 'settings_table.php'; ?>
          <?php include 'header.php'; ?>
  <div id="wrapper">

<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> View</a>
                    </li>
                    <li>
                        <a href="add_an_employee.php"><i class="fa fa-fw fa-bar-chart-o"></i> Add an employee</a>
                    </li>
                    <li >
                        <a href="departments.php"><i class="fa fa-fw fa-table"></i> Departments</a>
                    </li>
                    <li>
                        <a href="projects.php"><i class="fa fa-fw fa-edit"></i> Projects</a>
                    </li>
                    <li>
                        <a href="salary.php"><i class="fa fa-fw fa-desktop"></i> Salary</a>
                    </li>

                    <li>
                        <a href="attendance.php"><i class="fa fa-fw fa-users"></i> Attendance</a>
                    </li>

                    </li>
                    <li>
                        <a href="clients.php"><i class="fa fa-fw fa-file"></i> Clients</a>
                    </li>

                </ul>
            </div>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Profile
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Profile
                            </li>
                        </ol>
                    </div>
                </div>

<?php
$sql = mysqli_query($conn,"call admin_profile($user_check)");
while($row = mysqli_fetch_array($sql))
{
?>
<div class="container-fluid">
      <div class="row">




          <div class="panel panel-primary" align="left">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $login_session; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3" align="center">
                  <?php
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['emp_photo'] ).'" width="175" height="200"/>';

                  ?>
                 </div>


                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td><?php echo $row['dept_name']; ?></td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td><?php echo $row['joining_date']; ?></td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender']; ?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $row['address']; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $login_session; ?>@geocube.in</td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?php echo $row['contact_number']; ?>
                        </td>

                      </tr>
                      <tr>

                        <td>

                          Status
                        </td>
                        <?php $status = $row['enabled_flag']; ?>
                      <td><?php if($status == 0)
                      {
                        echo 'active';
                      }
                      else {
                        echo "inactive";
                      }?>
                    </td>
                      </tr>


                    </tbody>
                  </table>


                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
<?php
}
 ?>
<div id="header"></div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->

     <script type="text/javascript">

    $(document).ready(function(){
        $("#header").load("header.html");
    });
    </script>


</script>

</body>

</html>
<?php
}
 ?>
