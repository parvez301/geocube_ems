<?php
include 'web_services/dbconfig.php';
include 'web_services/session.php';
if(isset($_POST['btn-update']))
{
  ob_start();
  $date =$_POST['project_start_date'];
  $dateTime = new DateTime($date);
  $formatted_project_start_date=date_format ( $dateTime, 'Y-m-d' );
  $date =$_POST['project_end_date'];
  $dateTime = new DateTime($date);
  $formatted_project_end_date=date_format ( $dateTime, 'Y-m-d' );
  $values = array(
  "jsonProjectName" => $_POST['project_name'],
  "jsonProjectDescription" =>$_POST['project_description'],
  "jsonProjectStartDate" => $formatted_project_start_date,
  "jsonProjectEndDate"  => $formatted_project_end_date,
  "jsonCliendId"  => $_POST['cid'],
  "jsonDepartmentId"=>$_POST['did'],
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
  $updated_on = $result -> jsonUpdatedOn;
  $enabled_flag = 1;
  $sql= "CALL updateProject('".$_GET['edit_id']."','$project_name','$project_description','$project_start_date','$project_end_date','$client_id','$dept_id')";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    echo "<script language=\"JavaScript\">\n";
  echo "alert('Edit Successfull');\n";
  echo "window.location='index.php'";
  echo "</script>";
  }
}

 ?>
 <?php
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
    <script>
function checkForm()
{
//fetching values from all input fields and storing them in variables
   var project_name = document.getElementById("project_name").value;
   var project_description = document.getElementById("project_description").value;
   var project_start_date = document.getElementById("project_start_date").value;
   var project_end_date = document.getElementById("project_end_date").value;

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();


if(dd<10) {
   dd='0'+dd
}

if(mm<10) {
   mm='0'+mm
}
today = yyyy+'-'+mm+'-'+dd;

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear() +20;


if(dd<10) {
   dd='0'+dd
}

if(mm<10) {
   mm='0'+mm
}
tomorrow = yyyy+'-'+mm+'-'+dd;

if(project_name.length== 0 || project_description.length== 0) {

   alert("Fill all fields");
   return false;
}

   else if (project_start_date < today)
   {
       alert("Enter correct project start date ");

this.parentNode.setAttribute("style",
"background-color: #ffcccc");
  this.setAttribute("aria-invalid", "true");
    generateAlert("A value is required in this field");
    return false;

   }
    else if (project_start_date >  tomorrow)
   {
       alert("Enter correct project start date ");
       return false;

   }
   else if(project_end_date < today){
alert("Enter correct end date ");
       return false;

   }
   else if(project_end_date > tomorrow){
alert("Enter correct end date ");
       return false;

   }

   else
   {


           document.getElementById("contact-form").submit();
       }
   }



   </script>

</head>

<body>


    <div id="wrapper">

      <div class="collapse navbar-collapse navbar-ex1-collapse">
                     <ul class="nav navbar-nav side-nav">
                         <li>
                             <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> View</a>
                         </li>
                         <li >
                             <a href="add_an_employee.php"><i class="fa fa-fw fa-bar-chart-o"></i> Add an employee</a>
                         </li>
                         <li >
                             <a href="departments.php"><i class="fa fa-fw fa-table"></i> Departments</a>
                         </li>
                         <li class="active">
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
                <?php

                  if(isset($_GET['edit_id']))
                  {
                    $singleSql = "CALL selProject('".$_GET['edit_id']."')";
                    $singleResult = mysqli_query($conn,$singleSql);
                    while ($singleRow = mysqli_fetch_array($singleResult)) {
                    ?>
                    <form data-toggle="validator" onsubmit="return checkForm()"  id="contact-form"  class="form-horizontal" role="form" method="post" autocomplete="on">
                                            <div class="form-group" >
                                            <label for="project_name" class="col-lg-2 control-label">Project Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" maxlength="25"  class="form-control" id="project_name" name="project_name" value="<?php echo $singleRow['project_name']; ?>"  placeholder="Project Name" required autofocus>
                                            </div>
                                            </div>

                                             <div class="form-group" id="message-field">
                                            <label for="project_description" class="col-lg-2 control-label">Project Description</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" maxlength="150" rows="4" id="project_description" value="<?php echo $singleRow['project_description']; ?>" name="project_description" placeholder="Description" required></textarea>
                                            </div>
                                            </div>

                                             <div class="form-group" >

                                            <label for="project_start_date" class="col-lg-2 control-label">Project Start Date</label>
                                            <div class="col-lg-10">
                                                <input type="date" maxlength="4" name="project_start_date"  min="2000-01-01" max="2010-31-12" value="<?php echo $singleRow['project_start_date']; ?>"  class="form-control" id="project_start_date" name="project_start_date" required>
                                            </div>
                                            </div>
                                             <div class="form-group" >
                                            <label for="project_ends_date" class="col-lg-2 control-label">Project End Date</label>
                                            <div class="col-lg-10">
                                                <input type="date" maxlength="4"  class="form-control" id="project_end_date" name="project_end_date" value="<?php echo $singleRow['project_end_date']; ?>" >
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="mstatus" class="col-lg-2 control-label">Client Id</label>
                                            <div class="col-lg-10">
                                                <select class="form-control"  name="cid" id="mstatus">
                                                    <option><?php echo $singleRow['client_id']; ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="mstatus" class="col-lg-2 control-label">Department Id</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" value="<?php echo $singleRow['dept_id']; ?>" name="did" id="mstatus">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" onclick="return checkForm()" class="btn btn-warning" name="btn-update" id="btn-update">Update</button>
                                            </div>
                                            </div>
                    </form>
                    <?php
                  }
                  mysqli_free_result($singleResult);
                  mysqli_next_result($conn);
                  }
                  ?>

<?php
include 'settings_table.php';
include 'header.php';
 ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
        $("#header").load("header.html");
    });
    </script>

</body>

</html>
<?php
}
 ?>
