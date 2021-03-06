<?php
include 'web_services/dbconfig.php';
include 'web_services/session.php';
if(isset($_POST['btn-update']))
{
    ob_start();
  $values = array(
  "jsonClientName" => $_POST['client_name'],
  "jsonClientEmail" => $_POST['client_email'],
  "jsonClientAddress" => $_POST['client_address'],
  "jsonClientContactReference" => $_POST['client_contact_reference'],
  "jsonUpdatedOn" => date("Y-m-d")
  );
  $json_obj = json_encode($values);
  $result = json_decode($json_obj);
  $client_name = $result -> jsonClientName;
  $client_email = $result -> jsonClientEmail;
  $client_address = $result -> jsonClientAddress;
  $client_contact_reference= $result -> jsonClientContactReference;
  $enabled_flag = 1;
  $updated_on = $result -> jsonUpdatedOn;
  $sql = "CALL updateClient('".$_GET['edit_id']."','$client_name','$client_email','$client_address','$client_contact_reference','$updated_on')";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    echo "<script language=\"JavaScript\">\n";
  echo "alert('Edit Successfull');\n";
  echo "window.location='index.php'";
  echo "</script>";
  }
  mysqli_free_result($sql);
  mysqli_next_result($conn);

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
     <script>
function checkForm()
{
//fetching values from all input fields and storing them in variables
    var client_name = document.getElementById("client_name").value;
    var client_email = document.getElementById("client_email").value;
    var client_address = document.getElementById("client_address").value;
    var client_contact_reference = document.getElementById("client_contact_reference").value;
    var client_contact_reference_2 = document.getElementById("client_contact_reference_2").value;


if(client_name.length== 0 || client_address.length== 0 || client_email.length==0 || client_contact_reference.length==0||  client_contact_reference_2.length==0){

    alert("Fill all fields. Write N/A if not applicable");
    return false;
}

    else if (project_date < today)
    {
        alert("Enter correct project date ");
        return false;

    }
    else if(joining_date < today){
alert("Enter correct joining date ");
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
                         <li >
                             <a href="salary.php"><i class="fa fa-fw fa-desktop"></i> Salary</a>
                         </li>

                         <li>
                             <a href="attendance.php"><i class="fa fa-fw fa-users"></i> Attendance</a>
                         </li>

                         </li>
                         <li class="active">
                             <a href="clients.html"><i class="fa fa-fw fa-file"></i> Clients</a>
                         </li>

                     </ul>
                 </div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Clients
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>Clients
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php
                if(isset($_GET['edit_id']))
                {
                  $singleSql = "CALL selClient('".$_GET['edit_id']."')";
                  $singleResult = mysqli_query($conn,$singleSql);
                  while ($singleRow = mysqli_fetch_array($singleResult)) {
                    ?>
                 <form id="contact-form" onsubmit="return checkForm()" class="form-horizontal" role="form" method="post">

                         <div class="form-group" >

                        <label for="client_name" class="col-lg-2 control-label">Client Name</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"  placeholder="Name" class="form-control" id="client_name" name="client_name" value="<?php echo $singleRow['client_name']; ?>" required autofocus>
                        </div>
                        </div>


                           <div class="form-group" >

                        <label for="client_email" class="col-lg-2 control-label">Client email</label>
                        <div class="col-lg-10">
                            <input type="email" maxlength="25"   placeholder="Email"  class="form-control" id="client_email" name="client_email" value="<?php echo $singleRow['client_email']; ?>"required>
                        </div>
                        </div>

                         <div class="form-group" id="message-field">
                        <label for="client_address" class="col-lg-2 control-label">Client Address</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" maxlength="150" rows="4" id="client_address" name="client_address" value="<?php echo htmlentities($singleRow['client_address']); ?>"placeholder="Address" required></textarea>
                        </div>
                        </div>


                        <div class="form-group" >

                        <label for="client_contact_reference" class="col-lg-2 control-label">Client Contact Reference</label>
                        <div class="col-lg-10">
                            <input type="text" maxlength="25"   placeholder="Reference"  class="form-control" value="<?php echo $singleRow['client_contact_reference']; ?>"id="client_contact_reference" name="client_contact_reference" >
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" onclick="checkForm()" name = 'btn-update' id ='btn-update' class="btn btn-warning buttoncontactus">Update</button>
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
</<?php
}
 ?>
