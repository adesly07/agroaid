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
                  <li><a href="sales_item.php"><i class="fa fa-angle-right"></i>Sales Item</a></li>
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
                  <li><a href="a_misc.php"><i class="fa fa-angle-right"></i>Miscellaneous</a></li>
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
                <i class="fa fa-laptop"></i>
                <span>Sales</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                 
                  <li><a href="s_item.php"><i class="fa fa-angle-right"></i>Stock Sales Item</a></li>
                  <li><a href="s_history.php"><i class="fa fa-angle-right"></i>Stock History</a></li>
                  <li><a href="d_sales.php"><i class="fa fa-angle-right"></i>Sales</a></li>
                  <li><a href="s_record.php"><i class="fa fa-angle-right"></i>Sales Record</a></li>
                  <li><a href="s_report.php"><i class="fa fa-angle-right"></i>Sales Report</a></li>
                  <li><a href="s_return.php"><i class="fa fa-angle-right"></i>Sales Return</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-building"></i>
                <span>Account</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                  <li><a href="b_expenses.php"><i class="fa fa-angle-right"></i>Expenses</a></li>
                  <li><a href="b_income.php"><i class="fa fa-angle-right"></i>Income</a></li>
                  <li><a href="m_account.php"><i class="fa fa-angle-right"></i>Miscellaneous</a></li>
                  <li><a href="a_summary.php"><i class="fa fa-angle-right"></i>Summary</a></li>
                </ul>
              </li>
  <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>Dispense Materials</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="dispense.php"><i class="fa fa-angle-right"></i>Dispense</a></li>
                  <li><a href="v_material.php"><i class="fa fa-angle-right"></i>View Materials</a></li>
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
  <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>Poultry House</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="../house2/mgt020208585sly"><i class="fa fa-angle-right"></i>House 2</a></li>
                  <li><a href="../house3/mgt020208585sly"><i class="fa fa-angle-right"></i>House 3</a></li>
                </ul>
</li>


               <li class="treeview">
                <a href="c_user.php">
                <i class="fa fa-laptop"></i>
                <span>Create User</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
              </li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
