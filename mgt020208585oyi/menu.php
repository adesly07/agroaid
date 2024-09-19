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
                <span>Poultry House</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="../house2/mgt020208585oyi"><i class="fa fa-angle-right"></i>House 2</a></li>
                  <li><a href="../house3/mgt020208585oyi"><i class="fa fa-angle-right"></i>House 3</a></li>
                </ul>
</li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
