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
    <script>
function checkForm()
{
 var from_date = document.getElementById("from_date").value;
    var to_date = document.getElementById("to_date").value;
    var hra = document.getElementById("hra").value;
    var ta = document.getElementById("ta").value;
    var da = document.getElementById("da").value;
      var other_allowance = document.getElementById("other_allowance").value;

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
if(from_date.length == 0){
        alert('Please Enter From Date');
        document.getElementById('from_date').style.borderColor = "red";
         document.getElementById("from_date").focus();
        return false;
    }else{
        document.getElementById('from_date').style.borderColor = "green";
    }

if (from_date < today)
    {
        alert("Enter correct from date ");
       document.getElementById('from_date').style.borderColor = "red";
         document.getElementById("from_date").focus();
        return false;
    }else{
        document.getElementById('from_date').style.borderColor = "green";
    }


 if (from_date >  tomorrow)
    {
        alert("Enter correct from date ");
       document.getElementById('from_date').style.borderColor = "red";
         document.getElementById("from_date").focus();
        return false;
    }else{
        document.getElementById('from_date').style.borderColor = "green";
    }


    if(to_date.length == 0){
        alert('Please Enter To Date');
        document.getElementById('to_date').style.borderColor = "red";
         document.getElementById("to_date").focus();
        return false;
    }else{
        document.getElementById('to_date').style.borderColor = "green";
    }

 if(to_date < today){
alert("Enter correct  TO date ");
        document.getElementById('to_date').style.borderColor = "red";
         document.getElementById("to_date").focus();
        return false;
    }else{
        document.getElementById('to_date').style.borderColor = "green";
    }


  if(to_date > tomorrow){
alert("Enter correct to date ");
        document.getElementById('to_date').style.borderColor = "red";
         document.getElementById("to_date").focus();
        return false;
    }else{
        document.getElementById('to_date').style.borderColor = "green";
    }

    if(hra.length == 0){
        alert('Please Enter HRA');
        alert("Enter N/A if not applicable");
        document.getElementById('hra').style.borderColor = "red";
         document.getElementById("hra").focus();
        return false;
    }else{
        document.getElementById('hra').style.borderColor = "green";
    }
    if(ta.length == 0){
        alert('Please Enter TA');
           alert("Enter N/A if not applicable");
        document.getElementById('ta').style.borderColor = "red";
         document.getElementById("ta").focus();
        return false;
    }else{
        document.getElementById('ta').style.borderColor = "green";
    }
   if(da.length == 0){
        alert('Please Enter DA');
           alert("Enter N/A if not applicable");
        document.getElementById('da').style.borderColor = "red";
         document.getElementById("da").focus();
        return false;
    }else{
        document.getElementById('da').style.borderColor = "green";
    }
 if(other_allowance.length == 0){
        alert('Please Enter Other Allowance');
           alert("Enter N/A if not applicable");
        document.getElementById('other_allowance').style.borderColor = "red";
         document.getElementById("other_allowance").focus();
        return false;
    }else{
        document.getElementById('other_allowance').style.borderColor = "green";
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
                    <li class="active">
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



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Salary
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Salary
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<form action="web_services/salary.php" id="contact-form"   class="form-horizontal" role="form" method="post">







                         <div class="form-group" >


                           <label for="mstatus" class="col-lg-2 control-label">Emp Id</label>
                           <div class="col-lg-10">
                            <select class='form-control' name='eid' id='eid'>
                           <?php
                           $sql = mysqli_query($conn,"call emp_id_dropdown()");
                           while($row = mysqli_fetch_array($sql))
                           {
                            
                              echo "<option value='" . $row['emp_id'] ."'>" . $row['emp_id'] . "</option>";
                           
                            }
                            ?>
                             </select>;
                            
                           </div>
                           </div>
                           <div class="form-group">
                        <label for="from_date" class="col-lg-2 control-label">From</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="25"  class="form-control" id="from_date" name="from_date" required autofocus>
                        </div>
                        </div>


                         <div class="form-group" >

                        <label for="to_date" class="col-lg-2 control-label">To</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="25"  class="form-control" id="to_date" name="to_date" required>
                        </div>
                        </div>

                         <div class="form-group" >

                        <label for="hra" class="col-lg-2 control-label">House Rent Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="hra" name="hra" required>
                        </div>
                        </div>
                        <div class="form-group" >

                        <label for="ta" class="col-lg-2 control-label">Travel Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="ta" name="ta" required>
                        </div>
                        </div>

                        <div class="form-group" >

                        <label for="da" class="col-lg-2 control-label">Dearly Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="da" name="da" required>
                        </div>
                        </div>
                        <div class="form-group" >

                        <label for="other_allowance" class="col-lg-2 control-label">Other Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="other_allowance" name="other_allowance" required>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="return checkForm()" class="btn btn-warning ">Send</button>
                        </div>
                    </div>



</form>
</div>
</div>
<?php
  include  'settings_table.php';
 ?>

<?php
  include  'header.php';
 ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
<?php
}
 ?>
