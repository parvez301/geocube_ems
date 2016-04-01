<?php
include '../web_services/dbconfig.php';

 ?>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Welcome  <?php echo $login_session; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $login_session; ?><b class="caret"></b></a>
                     <ul class="dropdown-menu">
    <li><a href="manager_profile.php">Profile</a></li>
    <li><a data-toggle="modal" data-target="#myModal">Settings</a></li>
    <li><a href="../web_services/logout.php">Logout</a></li>
  </ul>


                </li>
            </ul>

            <!-- /.navbar-collapse -->
        </nav>
