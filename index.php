<?php
  include 'web_services/dbconfig.php';
  include 'web_services/session.php';


  if(isset($_GET['delete_id']))
  {
   $sql_query="DELETE FROM emp_ref_table WHERE emp_id=".$_GET['delete_id'];
   mysqli_query($sql_query);
   header("Location: $_SERVER[PHP_SELF]");
  }
  if(isset($_GET['delete_id']))
  {
  $sql_query="DELETE FROM dept_ref_table WHERE dept_id=".$_GET['delete_id'];
  mysqlii_query($sql_query);
  header("Location: $_SERVER[PHP_SELF]");
  }
  if(isset($_GET['delete_id']))
  {
   $sql_query="DELETE FROM project_ref_table WHERE project_id=".$_GET['delete_id'];
   mysqlii_query($sql_query);
   header("Location: $_SERVER[PHP_SELF]");
  }
  if(isset($_GET['delete_id']))
  {
   $sql_query="DELETE FROM client_ref_table WHERE client_id=".$_GET['delete_id'];
   mysqlii_query($sql_query);
   header("Location: $_SERVER[PHP_SELF]");
  }
  if(isset($_GET['delete_id']))
  {
   $sql_query="DELETE FROM salary_ref_table WHERE salary_id=".$_GET['delete_id'];
   mysqlii_query($sql_query);
   header("Location: $_SERVER[PHP_SELF]");
  }
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function editEmployee(id)
    {
     if(confirm('Sure to edit ?'))
     {
      window.location.href='editEmployee.php?edit_id='+id;
     }
    }
  function editDepartment(id)
  {
   if(confirm('Sure to edit ?'))
   {
    window.location.href='editDepartments.php?edit_id='+id;
   }
  }
  function editProject(id)
  {
   if(confirm('Sure to edit ?'))
   {
    window.location.href='editProjects.php?edit_id='+id;
   }
  }
  function editClient(id)
  {
   if(confirm('Sure to edit ?'))
   {
    window.location.href='editClients.php?edit_id='+id;
   }
  }
  function editSalary(id)
  {
   if(confirm('Sure to edit ?'))
   {
    window.location.href='editSalaries.php?edit_id='+id;
   }
  }
  function delete_id(id)
  {
   if(confirm('Sure to Delete ?'))
   {
    window.location.href='index.php?delete_id='+id;
   }
  }
</script>

</head>

<body>

    <div id="wrapper">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> View</a>
                    </li>
                    <li>
                        <a href="add_an_employee.php"><i class="fa fa-fw fa-bar-chart-o"></i> Add an employee</a>
                    </li>
                    <li>
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


        <!-- Navigation
        <div id="header"></div>-->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           View
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <form action="process.php" id="contact-form" class="form-horizontal" role="form" method="post">
                <div class="row">
                <div class="col-md-6">
<h3 style="color:red;">Employees</h3>
                        <table class="table table-sm">
    <thead>
      <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Contact Number</th>
        <th>Account Numberr</th>
        <th>Address</th>
        <th colspan="2">Operations</th>
      </tr>
    </thead>
<tbody>
      <?php
     
      $employee_sql = mysqli_query($conn, " CALL viewEmployees(); ");
      while($row = mysqli_fetch_array($employee_sql))
      {
      ?>
        <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><a href="javascript:editEmployee('<?php echo $row[0]; ?>')"><i class="fa fa-pencil-square-o" title="edit"></i></a>|
        <a href="javascript:delete_id('<?php echo $row[0]; ?>')"><i class="fa fa-times-circle" title="delete"></i></a></td>
        </tr>
        <?php
        }
        mysqli_free_result($employee_sql);
        mysqli_next_result($conn);
        ?>
</tbody>
</table>
               </div>
               <div class="col-md-6">
<h3 style="color:red">Departments</h3>
                       <table class="table table-sm">
           <thead>
           <tr>
           <th>Dept. ID</th>
           <th>Dept. Name</th>
           <th colspan="2">Operations</th>


           </tr>
           </thead>
           <tbody>

           <?php
          
           $sql = mysqli_query($conn, " CALL viewDepartment(); ");
           while($row = mysqli_fetch_array($sql))
           {
           ?>
           <tr>
           <td><?php echo $row[0]; ?></td>
           <td><?php echo $row[1]; ?></td>
           <td><a href="javascript:editDepartment('<?php echo $row[0]; ?>')"><i class="fa fa-pencil-square-o" title="edit"></i></a>|
           <a href="javascript:delete_id('<?php echo $row[0]; ?>')"><i class="fa fa-times-circle" title="delete"></i></a></td>
           </tr>
           <?php
           }
           mysqli_free_result($sql);
           mysqli_next_result($conn);
           ?>

           </tbody>


           </table>
              </div>
               </div>
               <div class="row">

                <div class="col-md-6">
      <h3 style="color:red">Projects</h3>
                        <table class="table table-sm">
      <thead>
      <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Client id</th>
        <th >Operations</th>

      </tr>
      </thead>

      <tbody>
      <?php
      $project_sql = mysqli_query($conn, " CALL viewProject(); ");
      while($row = mysqli_fetch_array($project_sql))
      {
      ?>
       <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><a href="javascript:editProject('<?php echo $row[0]; ?>')"><i class="fa fa-pencil-square-o" title="edit"></i></a>|
          <a href="javascript:delete_id('<?php echo $row[0]; ?>')"><i class="fa fa-times-circle" title="delete"></i></a></td>

      </tr>
          <?php
      }
      mysqli_free_result($project_sql);
      mysqli_next_result($conn);
          ?>


      </tbody>


      </table>
      </div>


      <div class="col-md-6">
      <h3 style="color:red">Clients</h3>
              <table class="table table-sm">

      <thead>
      <tr>
      <th>Client ID</th>
      <th>Client Name</th>
      <th>Client Email</th>
      <th>Client Address</th>
      <th colspan="2">Operations</th>
      </tr>
      </thead>
      <tbody>

      <?php
  
      $clientSql = mysqli_query($conn,"CALL viewClient();");

      while($clientRow=mysqli_fetch_array($clientSql))
      {
      ?>
      <tr>
        <td><?php echo $clientRow[0]; ?></td>
        <td><?php echo $clientRow[1]; ?></td>
        <td><?php echo $clientRow[2]; ?></td>
        <td><?php echo $clientRow[3]; ?></td>
        <td><a href="javascript:editClient('<?php echo $clientRow[0]; ?>')"><i class="fa fa-pencil-square-o" title="edit"></i></a>|<a href="javascript:delete_id('<?php echo $row[0]; ?>')"><i class="fa fa-times-circle" title="delete"></i></a></td>
        </tr>
      <?php
      }
      mysqli_free_result($clientSql);
      mysqli_next_result($conn);
      ?>

      </tbody>


      </table>
      </div>
    </div>
    <div class="row">

                   <div class="col-md-6">
   <h3 style="color:red;">Salaries</h3>
                           <table class="table table-sm">
       <thead>
         <tr>
           <th>Salary Id</td>
           <th>Emp Id</th>
           <th>From</th>
           <th>To</th>
           <th>Total Salary</th>
           <th>Operations</th>

         </tr>
       </thead>
   <tbody>
     <?php
     $salarySql = mysqli_query($conn,"CALL viewSalary();");
     while($row=mysqli_fetch_array($salarySql))
     {
     ?>
     <tr>
       <td><?php echo $row[0]; ?></td>
       <td><?php echo $row[1]; ?></td>
       <td><?php echo $row[2]; ?></td>
       <td><?php echo $row[3]; ?></td>
       <td><?php echo $row[4]; ?></td>
       <td><a href="javascript:editSalary('<?php echo $row[0]; ?>')"><i class="fa fa-pencil-square-o" title="edit"></i></a>|<a href="javascript:delete_id('<?php echo $row[0]; ?>')"><i class="fa fa-times-circle" title="delete"></i></a></td>
       </tr>
     <?php
     }
     mysqli_free_result($salarySql);
     mysqli_next_result($conn);
     ?>

   </tbody>


       </table></div>


                <div class="col-md-6">
<h3 style="color:red;">Attendence</h3>
                        <table class="table table-sm">
    <thead>
      <tr>
        <th>Employee Name</th>
        <th>Attendance</th>
        <th>Attendance %</th>
      </tr>
    </thead>
<tbody>
    <tr>
    <td>
    <a href="#">xyz</a>
    </td>
     </tr>


</tbody>


    </table>
               </div></div>



                </form>
                <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->

    </div>
  <?php
include 'settings_table.php';
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
