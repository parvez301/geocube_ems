<?php
include 'web_services/dbconfig.php';
?>
<!doctype html>
<html>
<head>
<title>Login:Enter your Credentials</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/login_form.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" rel='stylesheet' type="text/css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

</head>
<body>
<form action="web_services/login.php" id="login-form"  class="form-horizontal" role="form" method="post">
<div class="login">
  <div class="login-header">
    <h1>EMS</h1>
  </div>
  <div class="login-form">
    <h3>Employee Id:</h3>
    <input type="text" maxlength="25"  id="emp_id" name="emp_id" placeholder="Employee Id" required autofocus><br>
    <h3>Password:</h3>
    <input type="password" maxlength="25"   id="password" name="password" placeholder="password please" required>
    <br>
    <button type="submit" onclick="checkForm()" name ="submit"class="btn btn-warning ">Submit</button>
    <br>
    <br>
    <h6 class="no-access"><a href="web_services/forget_password.php">Forget password</a></h6>
  </div>
</div>

</form>
</body>
</html>
