<?php
include 'web_services/dbconfig.php';
include 'web_services/session.php';
if(isset($_POST['btn-update']))
{
  ob_start();
  $date =$_POST['from_date'];
  $dateTime = new DateTime($date);
  $formatted_from_date=date_format ( $dateTime, 'Y-m-d' );
  $date =$_POST['to_date'];
  $dateTime = new DateTime($date);
  $formatted_to_date=date_format ( $dateTime, 'Y-m-d' );
  $values = array(
  "jsonEmpId" => $_POST['eid'],
  "jsonFromDate" => $formatted_from_date,
  "jsonToDate"  => $formatted_to_date,
  "jsonHouseRentAllowance" =>$_POST['hra'],
  "jsonTravelAllowance"  => $_POST['ta'],
  "jsonDearlyAllowance"  => $_POST['da'],
  "jsonOtherAllowance"  => $_POST['other_allowance'],
  "jsonUpdatedOn" => date("Y-m-d")
);
  $json_obj = json_encode($values);
  $result = json_decode($json_obj);
  $emp_id = $result -> jsonEmpId;
  $from_date = $result -> jsonFromDate;
  $to_date = $result -> jsonToDate;
  $hra = $result -> jsonHouseRentAllowance;
  $ta = $result -> jsonTravelAllowance;
  $da = $result -> jsonTravelAllowance;
  $oa = $result -> jsonOtherAllowance;
  $updated_on = $result -> jsonUpdatedOn;
  $sql = "CALL updateSalary('".$_GET['edit_id']."','$emp_id','$from_date','$to_date','$hra','$ta','$da','$oa','$updated_on')";
  $result = mysqli_query($conn,$sql);
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

if(hra.lenght== 0 || ta.length == 0 || da.length == 0 || other_allowance.length == 0){

    alert("Enter N/A if not required")
}

    else if (from_date < today)
        {
            alert("Enter correct from date ");

    this.parentNode.setAttribute("style",
    "background-color: #ffcccc");
       this.setAttribute("aria-invalid", "true");
         generateAlert("A value is required in this field");
         return false;

        }
         else if (from_date >  tomorrow)
        {
            alert("Enter correct from date ");
            return false;

        }
        else if(to_date < today){
    alert("Enter correct to date ");
            return false;

        }
        else if(to_date > tomorrow){
    alert("Enter correct to date ");
            return false;

    }

    else
    {


            document.getElementById("contact-form").submit();
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
                         <li >
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
                 </div>


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
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Salary
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                if(isset($_GET['edit_id']))
                {
                  $singleSql = "CALL selSalary('".$_GET['edit_id']."')";
                  $singleResult = mysqli_query($conn,$singleSql);
                  while ($singleRow = mysqli_fetch_array($singleResult)) {
                    ?>
                <form  id="contact-form"   class="form-horizontal" role="form" method="post">
                         <div class="form-group" >
                           <label for="mstatus" class="col-lg-2 control-label">Emp Id</label>
                           <div class="col-lg-10">
                               <select class="form-control" name="eid" id="eid">
                                 <option><?php echo $singleRow['emp_id']; ?>
                                   <option>1</option>
                                   <option>2</option>
                                   <option>3</option>
                                   <option>4</option>
                                   <option>5</option>
                                   <option>6</option>
                                   <option>7</option>
                                   <option>8</option>
                                   <option>9</option>
                                   <option>10</option>
                                   <option>11</option>
                                   <option>12</option>
                                   <option>13</option>
                                   <option>14</option>
                                   <option>15</option>
                                   <option>16</option>
                                   <option>17</option>
                                   <option>18</option>
                                   <option>19</option>
                                   <option>20</option>
                                   <option>21</option>
                                   <option>22</option>
                                   <option>23</option>
                                   <option>24</option>
                               </select>
                           </div>
                           </div>
                           <div class="form-group">
                        <label for="from_date" class="col-lg-2 control-label">From</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="25"  class="form-control" id="from_date" name="from_date" value="<?php echo $singleRow['from_date']; ?>"required autofocus>
                        </div>
                        </div>


                         <div class="form-group" >

                        <label for="to_date" class="col-lg-2 control-label">To</label>
                        <div class="col-lg-10">
                            <input type="date" maxlength="25"  class="form-control" id="to_date"value="<?php echo $singleRow['to_date']; ?>" name="to_date" required>
                        </div>
                        </div>

                         <div class="form-group" >

                        <label for="hra" class="col-lg-2 control-label">House Rent Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="hra" value="<?php echo $singleRow['home_rent_allowance']; ?>"name="hra" required>
                        </div>
                        </div>
                        <div class="form-group" >

                        <label for="ta" class="col-lg-2 control-label">Travel Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="ta" value="<?php echo $singleRow['travel_allowance']; ?>"name="ta" required>
                        </div>
                        </div>

                        <div class="form-group" >

                        <label for="da" class="col-lg-2 control-label">Dearly Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="da" name="da"value="<?php echo $singleRow['dearly_allowance']; ?>" required>
                        </div>
                        </div>
                        <div class="form-group" >

                        <label for="other_allowance" class="col-lg-2 control-label">Other Allowance</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  class="form-control" id="other_allowance" name="other_allowance" value="<?php echo $singleRow['other_allowance']; ?>" required>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="return checkForm()" name="btn-update" id="btn-update"class="btn btn-warning ">Update</button>
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
   include  'settings_table.php';
  ?>

 <?php
   include  'header.php';
  ?>
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
