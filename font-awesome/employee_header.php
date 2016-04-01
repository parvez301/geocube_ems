
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Welcome  <?php echo $login_session; ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">


                        </li>


                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">


                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $login_session; ?> <b class="caret"></b></a>
                     <ul class="dropdown-menu">
    <li><a href="performance.html">Profile</a></li>
    <li><button type="button" class="btn" data-toggle="modal" data-target="#myModal">settings</button>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Settings</h4>
        </div>
        <div class="modal-body">
          <form action="#"   class="form-horizontal" role="form" method="post">




                        <div class="form-group" >
                        <label for="setting_name" class="col-lg-4 control-label">Setting Name</label>
                        <div class="col-lg-8">
                            <input type="text" maxlength="25"  class="form-control" id="setting_name" name="setting_name" placeholder="Setting Name" required>
                        </div></div>

                        <div class="form-group" >
                        <label for="setting_value" class="col-lg-4 control-label">Setting Value</label>
                        <div class="col-lg-8">
                            <input type="int" maxlength="10"  class="form-control" id="setting_value" name="setting_value" placeholder="Setting Value" required>
                        </div></div>
                        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-6">
                            <button type="submit" class="btn btn-warning">Send</button>
                        </div></div>


        <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" data-dismiss="modal" class="btn btn-info">Close</button>
                        </div></div></form>
      </div>
    </div>
  </div>
</div>


    <li><a href="../web_services/logout.php">Logout</a></li>
  </ul>


                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Attendance</a>
                    </li>

                    <li>
                        <a href="employee_projects.php"><i class="fa fa-fw fa-edit"></i> Projects</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
