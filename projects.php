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
    <!-- Latest compiled and minified CSS -->


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

var tomorrow = new Date();
var dd = tomorrow.getDate();
var mm = tomorrow.getMonth()+1; //January is 0!
var yyyy = tomorrow.getFullYear() +20;


if(dd<10) {
    dd='0'+dd
}

if(mm<10) {
    mm='0'+mm
}
tomorrow = yyyy+'-'+mm+'-'+dd;

if(project_name.length == 0){
        alert('Please Enter Project Name');
        document.getElementById('project_name').style.borderColor = "red";
         document.getElementById("project_name").focus();
        return false;
    }else{
        document.getElementById('project_name').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("project_name").value)) {
        alert("Project Name Contains Numbers!");
        document.getElementById('project_name').style.borderColor = "red";
         document.getElementById("project_name").focus();
        return false;
    }else{
        document.getElementById('project_name').style.borderColor = "green";
    }



if(project_description.length == 0){
        alert('Please Enter Project Description');
        document.getElementById('project_description').style.borderColor = "red";
         document.getElementById("project_description").focus();
        return false;
    }else{
        document.getElementById('project_description').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("project_description").value)) {
        alert("Project Description Contains Numbers!");
        document.getElementById('project_description').style.borderColor = "red";
         document.getElementById("project_description").focus();
        return false;
    }else{
        document.getElementById('project_description').style.borderColor = "green";
    }
if(project_start_date.length == 0){
        alert('Please Enter Project Start Date');
        document.getElementById('project_start_date').style.borderColor = "red";
         document.getElementById("project_start_date").focus();
        return false;
    }else{
        document.getElementById('project_start_date').style.borderColor = "green";
    }
if(project_end_date.length == 0){
        alert('Please Enter Project End Date');
        document.getElementById('project_end_date').style.borderColor = "red";
         document.getElementById("project_end_date").focus();
        return false;
    }else{
        document.getElementById('project_end_date').style.borderColor = "green";
    }


if (project_start_date < today)
    {
        alert("Enter correct project start date ");
       document.getElementById('project_start_date').style.borderColor = "red";
         document.getElementById("project_start_date").focus();
        return false;
    }else{
        document.getElementById('project_start_date').style.borderColor = "green";
    }


 if (project_start_date >  tomorrow)
    {
        alert("Enter correct project start date ");
       document.getElementById('project_start_date').style.borderColor = "red";
         document.getElementById("project_start_date").focus();
        return false;
    }else{
        document.getElementById('project_start_date').style.borderColor = "green";
    }
 if(project_end_date < today){
alert("Enter correct end date ");
        document.getElementById('project_end_date').style.borderColor = "red";
         document.getElementById("project_end_date").focus();
        return false;
    }else{
        document.getElementById('project_end_date').style.borderColor = "green";
    }

  if(project_end_date > tomorrow){
alert("Enter correct end date ");
        document.getElementById('project_end_date').style.borderColor = "red";
         document.getElementById("project_end_date").focus();
        return false;
    }else{
        document.getElementById('project_end_date').style.borderColor = "green";
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
     <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Projects
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-wrench"></i> Projects
                            </li>
                        </ol>
                    </div>
                </div>
                </div>
              </div>

        <!-- Navigation -->


<form data-toggle="validator" onsubmit="return checkForm()" action="web_services/projects.php" id="contact-form"  class="form-horizontal" role="form" method="post" autocomplete="on">





                        <div class="form-group" >
                        <label for="project_name" class="col-lg-2 control-label">Project Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="project_name" name="project_name" placeholder="Project Name" required autofocus>
                        </div>
                        </div>

                         <div class="form-group" id="message-field">
                        <label for="project_description" class="col-lg-2 control-label">Project Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" maxlength="150" rows="4" id="project_description" name="project_description" placeholder="Description" required></textarea>
                        </div>
                        </div>

                         <div class="form-group" >

                        <label for="project_start_date" class="col-lg-2 control-label">Project Start Date</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="4" name="project_start_date"  min="2000-01-01" max="2010-31-12"  class="form-control" id="project_start_date" name="project_start_date" required>
                        </div>
                        </div>


                         <div class="form-group" >

                        <label for="project_ends_date" class="col-lg-2 control-label">Project End Date</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="4"  class="form-control" id="project_end_date" name="project_end_date" >
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="mstatus" class="col-lg-2 control-label">Client Id</label>
                        <div class="col-lg-10">
                      <select class='form-control' name='cid' id='cid'>
                           <?php
                           $sql = mysqli_query($conn,"call client_id_dropdown()");
                           while($row = mysqli_fetch_array($sql))
                           {
                            
                              echo "<option value='" . $row['client_id'] ."'>" . $row['client_id'] . "</option>";
                           
                            }
                                mysqli_free_result($sql);
                                mysqli_next_result($conn);
                            ?>
                            </select>
                        </div>

                        </div>
                    
                        <div class="form-group">
                        <label for="mstatus" class="col-lg-2 control-label">Department Id</label>
                        <div class="col-lg-10">
                           <select class='form-control' name='did' id='did'>
                           <?php
                           $sql = mysqli_query($conn,"call dept_id_dropdown()");
                           while($row = mysqli_fetch_array($sql))
                           {
                              echo "<option value='" . $row['dept_id'] ."'>" . $row['dept_id'] . "</option>";
                            }
                            ?>
                             </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="return checkForm()" class="btn btn-warning ">Send</button>
                        </div>
                    </div>



</form>
</div>

<?php
include  'settings_table.php';
  include  'header.php';
 ?>

<script src="js/jquery.js"></script>


    <!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</html>
<?php
}
 ?>
