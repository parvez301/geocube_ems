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
//fetching values from all input fields and storing them in variables

    var joining_date = document.getElementById("hid").value;
    var first_name = document.getElementById("fname").value;
    var last_name = document.getElementById("lname").value;
    var address = document.getElementById("add").value;
    var contact_number = document.getElementById("cno").value;
    var account_number = document.getElementById("ano").value;
    var middle_name = document.getElementById("mname").value;
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

if(first_name.length == 0){
        alert('Please Enter First Name');
        document.getElementById('fname').style.borderColor = "red";
         document.getElementById("fname").focus();
        return false;
    }else{
        document.getElementById('fname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("fname").value)) {
        alert("First Name Contains Numbers!");
        document.getElementById('fname').style.borderColor = "red";
         document.getElementById("fname").focus();
        return false;
    }else{
        document.getElementById('fname').style.borderColor = "green";
    }




if(middle_name.length == 0){
        alert('Please Enter Middle Name');
          alert('Enter N/A if not applicable@1');
        document.getElementById('mname').style.borderColor = "red";
         document.getElementById("mname").focus();
        return false;
    }else{
        document.getElementById('mname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("mname").value)) {
        alert("Middle Name Contains Numbers!");
        document.getElementById('mname').style.borderColor = "red";
         document.getElementById("mname").focus();
        return false;
    }else{
        document.getElementById('mname').style.borderColor = "green";
    }




if(last_name.length == 0){
        alert('Please Enter Last Name');
        document.getElementById('lname').style.borderColor = "red";
         document.getElementById("lname").focus();
        return false;
    }else{
        document.getElementById('lname').style.borderColor = "green";
    }
    if (/^[0-9]+$/.test(document.getElementById("lname").value)) {
        alert("Last Name Contains Numbers!");
        document.getElementById('lname').style.borderColor = "red";
         document.getElementById("lname").focus();
        return false;
    }else{
        document.getElementById('lname').style.borderColor = "green";
    }
var category = document.getElementsByName("gender");
  var check1 = 0;
  for(i=0;i<category.length;i++){
    if(category[i].checked){
      check1++;
      break;
    }
  }
  if(check1){
  }else{
    alert("Please state Gender");
     document.getElementsByName("gender").focus();
    return false;
  }



    if(address.length == 0){
        alert('Please Enter Address');
        document.getElementById('add').style.borderColor = "red";
         document.getElementById("add").focus();
        return false;
    }else{
        document.getElementById('add').style.borderColor = "green";
    }
if(contact_number.length == 0){
        alert('Please Enter Contact Number');
        document.getElementById('cno').style.borderColor = "red";
         document.getElementById("cno").focus();
        return false;
    }else{
        document.getElementById('cno').style.borderColor = "green";
    }
if(account_number.length == 0){
        alert('Please Enter Account Number');
        document.getElementById('ano').style.borderColor = "red";
         document.getElementById("ano").focus();
        return false;
    }else{
        document.getElementById('ano').style.borderColor = "green";
    }

var ifsc=document.getElementById("ifsc").value;
    if(ifsc.length == 0){
        alert('Please Enter IFSC Code');
        document.getElementById('ifsc').style.borderColor = "red";
         document.getElementById("ifsc").focus();
        return false;
    }else{
        document.getElementById('ifsc').style.borderColor = "green";
    }


    if(joining_date.length == 0){
        alert('Please Enter Joining Date');
        document.getElementById('hid').style.borderColor = "red";
         document.getElementById("hid").focus();
        return false;
    }else{
        document.getElementById('hid').style.borderColor = "green";
    }


    if(joining_date < today){
alert("Enter correct joining date ");
       document.getElementById('hid').style.borderColor = "red";
        document.getElementById("hid").focus();
        return false;
    }else{
        document.getElementById('hid').style.borderColor = "green";
    }}
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
                    <li class="active">
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
                            Add an employee
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Add an employee
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- /.row -->


                <!-- Flot Charts --><form action="web_services/employee.php" id="contact-form"  class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group" >
                        <label for="fname" class="col-lg-2 control-label">Employee First Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="fname" name="fname" placeholder="First Name" required autofocus>
                        </div>
                        </div>
                        <div class="form-group " >
                        <label for="mname" class="col-lg-2 control-label text-left">Employee Middle Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="mname" name="mname" placeholder="Middle Name" >
                        </div>
                        </div>
                        <div class="form-group" >
                        <label for="lname" class="col-lg-2 control-label">Employee Last Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                        </div>
                        </div>
                         <div class="form-group" >
                        <label for="gender" class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-10">

      <input type="radio"   name = "gender" value="male" id="gender"> Male
   <input type="radio" value="female"  name = "gender" id="gender"> Female
                        </div>
                        </div>

                        <div class="form-group" id="message-field">
                        <label for="add" class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" maxlength="150" rows="4" id="add" name="add" placeholder="Address" required></textarea>
                        </div>
                        </div>



                        <div class="form-group" id="message-field">
                        <label class="col-lg-2 control-label">Upload Photo</label>
                        <div class="col-lg-10">
                           <input id="input-2" name="photo" id="photo" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                        </div>
                        </div>

                        <div class="form-group" id="message-field">
                        <label class="col-lg-2 control-label">Upload Resume</label>
                        <div class="col-lg-10">
                           <input id="input-2" name="resume" id="resume" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
                        </div>
                        </div>

                        <div class="form-group" >
                        <label for="countryCode" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="country_code" id="country_code">
    <option data-countryCode="IN" value="91" Selected>India (+91)</option>


</select>
                        </div>
                        </div>


                        <div class="form-group" >
                        <label for="cno" class="col-lg-2 control-label">Contact Number</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="10"  class="form-control" id="cno" name="cno" placeholder="Number" required>
                        </div>
                        </div>



                        <div class="form-group" >

                        <label for="ano" class="col-lg-2 control-label">Account Number</label>
                        <div class="col-lg-10">
                            <input type="number" maxlength="25"  class="form-control" id="ano" name="ano" placeholder="Account Number" required>
                        </div>
                        </div>

                        <div class="form-group" >
                        <label for="ifsc" class="col-lg-2 control-label">Bank IFSC Code</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="ifsc" name="ifsc" placeholder="IFSC" required>
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
                              mysqli_free_result($sql);
                                mysqli_next_result($conn);
                            ?>
                             </select>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="mstatus" class="col-lg-2 control-label">Project Id</label>
                        <div class="col-lg-10">
                           <select class='form-control' name='pid' id='pid'>
                           <?php
                           $sql = mysqli_query($conn,"call project_id_dropdown()");
                           while($row = mysqli_fetch_array($sql))
                           {
                              echo "<option value='" . $row['project_id'] ."'>" . $row['project_id'] . "</option>";
                            }
                            ?>
                             </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="hid" class="col-lg-2 control-label">Joining Date</label>
                        <div class="col-lg-2">
                            <input type="date" maxlength="25"  class="form-control" id="hid" name="hid" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="mstatus" class="col-lg-2 control-label">Martial Status</label>
                        <div class="col-lg-2">
                            <select class="form-control" name="martial_status" id="martial_status">

                                <option>Married</option>
                                <option>Un-Married</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="return checkForm()" class="btn btn-warning ">submit</button>
                        </div>
                    </div>
                  </form>

                </div>
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
