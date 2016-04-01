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
     <script type="text/javascript">
    function checkForm()
{

var department_name = document.getElementById('department_name').value;

if(department_name.length == 0){
        alert('Please Enter Department Name');
        document.getElementById('department_name').style.borderColor = "red";
         document.getElementById("department_name").focus();
        return false;
    }else{
        document.getElementById('department_name').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("department_name").value)) {
        alert("Department Name Contains Numbers!");
        document.getElementById('department_name').style.borderColor = "red";
         document.getElementById("department_name").focus();
        return false;
    }else{
        document.getElementById('department_name').style.borderColor = "green";
    }
}

    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> View</a>
                    </li>
                    <li>
                        <a href="add_an_employee.php"><i class="fa fa-fw fa-bar-chart-o"></i> Add an employee</a>
                    </li>
                    <li class="active">
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
                       Departments
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Departments
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Page Heading -->
                <form action="web_services/departments.php" id="contact-form" class="form-horizontal" role="form" method="post">





                        <div class="form-group" >
                        <label for="department_name" class="col-lg-2 control-label">Department Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="department_name" name="department_name" placeholder="Department Name" required autofocus>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="return checkForm()" class="btn btn-warning">Add</button>
                        </div>
                    </div>
                </form>
</div>
<?php
  include  'settings_table.php';
 ?>

<?php
  include  'header.php';
 ?>




    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
 ?>
