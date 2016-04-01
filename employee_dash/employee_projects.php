<?php
  include '../web_services/dbconfig.php';
  include '../web_services/session.php';
  $now = time();
 if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "<script language=\"JavaScript\">\n";
            echo "window.location='../login_form.php'";
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

    <title>Employee</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
          <li >
              <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Attendance</a>
          </li>

          <li class="active">
              <a href="employee_projects.php"><i class="fa fa-fw fa-edit"></i> Projects</a>
          </li>


      </ul>
  </div>

       <?php include 'settings_table.php'; ?>
               <?php include 'employee_header.php'; ?>
    <div id="wrapper">
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

      <!-- /.navbar-collapse -->

        <!-- Navigation -->
      <?php include 'employee_header.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          Projects
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Projects
                            </li>
                        </ol>
                    </div>
                </div>


                <div class="row">
                <div class="col-md-12">

                        <table class="table table-sm">
    <thead>
      <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Project</th>




      </tr>
    </thead>
<tbody>
  <?php
  $emp_id = $_SESSION['emp_id'];
  $sql = mysqli_query($conn,"call employee_projects($emp_id)") or die(mysqli_error($conn));
  while($row = mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo $row[0]; ?></td>
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>
               </div>
             </div>
             </div>
           </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


     <script type="text/javascript">

    $(document).ready(function(){
        $("#header").load("employee_header.html");
    });
    </script>


</body>

</html>
</<?php
}
 ?>
