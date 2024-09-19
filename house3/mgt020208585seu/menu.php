<?php
include ('../uconx.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>ERP System</title>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			                <li class="treeview">
                <a href="#">
                <i class="fa fa-building"></i>
                <span>General Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                  <li><a href="pen.php"><i class="fa fa-angle-right"></i>Pen</a></li>
                  <li><a href="batch.php"><i class="fa fa-angle-right"></i>Batch</a></li>
                  <li><a href="u_batch.php"><i class="fa fa-angle-right"></i>Update Batch</a></li>
                  <li><a href="feeds.php"><i class="fa fa-angle-right"></i>Feeds</a></li>
                  <li><a href="chicks.php"><i class="fa fa-angle-right"></i>Chicks</a></li>
                  <li><a href="vaccine.php"><i class="fa fa-angle-right"></i>Vaccine</a></li>
                  <li><a href="medication.php"><i class="fa fa-angle-right"></i>Medication</a></li>
                </ul>
              </li>
<li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>Add Stock</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="a_feeds.php"><i class="fa fa-angle-right"></i>Feed</a></li>
                  <li><a href="a_chicks.php"><i class="fa fa-angle-right"></i>Chicks</a></li>
                  <li><a href="a_vaccine.php"><i class="fa fa-angle-right"></i>Vaccine</a></li>
                  <li><a href="a_medication.php"><i class="fa fa-angle-right"></i>Medication</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-building"></i>
                <span>Flock Management</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                  <li><a href="f_feeding.php"><i class="fa fa-angle-right"></i>Feeding</a></li>
                  <li><a href="f_vaccination.php"><i class="fa fa-angle-right"></i>Vaccination</a></li>
                  <li><a href="f_medication.php"><i class="fa fa-angle-right"></i>Medication</a></li>
                  <li><a href="weight.php"><i class="fa fa-angle-right"></i>Weight Management</a></li>
                  <li><a href="v_weight.php"><i class="fa fa-angle-right"></i>View Weight</a></li>
                  <li><a href="e_fcr.php"><i class="fa fa-angle-right"></i>Economic FCR</a></li>
                </ul>
              </li>
  <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>Activities Scheduling</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="r_manager.php"><i class="fa fa-angle-right"></i>Register Farm Managers</a></li>
                  <li><a href="schedule.php"><i class="fa fa-angle-right"></i>Schedule Farm Managers</a></li>
                  <li><a href="v_schedule.php"><i class="fa fa-angle-right"></i>View Schedule</a></li>
                </ul>
</li>


            </ul>
          </div>
          <!-- /.navbar-collapse -->
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
