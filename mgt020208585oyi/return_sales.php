<?php
include ('../uconx.php');

if(!isset($_session))
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
while ($row = mysql_fetch_array($sql)) {
$name = $row['name'];	
}
/////////
/*	 $b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}
*/

$sn = $_REQUEST['id'];
$sql1 = mysql_query("select * from sales where id = '$sn'");
while ($row = mysql_fetch_array($sql1)) {	
	//	$id = $row ['id'];
		$r_no = $row ['r_no'];
		$qty = $row ['quantity'];
		$item = $row ['item'];
		$rate = $row ['rate'];	
		$s_item = $row ['s_item'];	
		$amount = $row ['amount'];
		$s_date = $row ['s_date'];
		$s_time = $row ['s_time'];
		$s_by = $row ['s_by'];
		$p_name = $row ['p_name'];
		$batch = $row ['batch'];
}

$submit = $_POST['submit'];
if ($submit == "Return")
{  // text1
$id = $_POST['sn'];
$reason = $_POST['reason'];
$myr_no = $_POST['r_no'];
$mys_item = $_POST['s_item'];
$myitem = $_POST['item'];
$myqty = $_POST['qty1'];
//$myqty2 = $_POST['qty2'];
$myrate = $_POST['rate'];
$myamount = $_POST['amt'];
$mys_by = $_POST['s_by'];
$mys_date = $_POST['s_date'];
$mys_time = $_POST['s_time'];
$mybatch = $_POST['batch'];
$myp_name = $_POST['p_name'];
$ip = $_SERVER['REMOTE_ADDR'];
//$r_qty = ($myqty1 - $myqty2);
$sql2 = mysql_query("insert into s_return set batch = '$mybatch', p_name = '$myp_name', r_no = '$myr_no', s_item = '$mys_item', item = '$myitem', quantity = '$myqty', rate = '$myrate', amount = '$myamount', s_by = '$mys_by', s_date = '$mys_date', s_time = '$mys_time', ip = '$ip', reason = '$reason', r_user = '$name'");
if ($sql2) {
$sql3 = mysql_query("update sales set p_status = 'RETURNED' where id = '$id'");	
if ($sql3) {
header('location: s_record.php');	
} else {
die (mysql_error());	
}
}

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>ERP System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="OneTouch Property Management Solutions" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.php"><span class="fa fa-area-chart"></span>POULTRY<span class="dashboard_text">ERP SYSTEM</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
					  <li class="dropdown head-dpdn">
							<?php echo date('l F j, Y.'); ?>
						| <a href="index.php">Back</a></li>
                    </ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p>Welcome</p>
										<span><?php echo $name; ?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
								<li> <a href="edit.php"><i class="fa fa-user"></i> Edit Password</a> </li> 
								<li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li> 
								<li> <a href="logout.php?link=index"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
<p>&nbsp;</p>
<table width="600" align="center" class="table table-hover">
<tr>
			    <td width="69" align="center"><div class="alert alert-success" role="alert"><span class="stock"><strong>RETURN SALES</strong></span></div></td>
		      </tr>
			  <tr>
			    <td height="30" align="left"><form name="form1" method="post" action="return_sales.php">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-hover">
			        <tr>
			          <td colspan="7"><strong class="cred">ITEM DETAILS</strong></td>
		            </tr>
			        <tr>
			          <td><input name="sn" type="hidden" id="sn" value="<?php echo $sn; ?>">
			            <input name="item" type="hidden" id="item" value="<?php echo $item; ?>">
			            <input name="qty1" type="hidden" id="qty1" value="<?php echo $qty; ?>">
                      <input name="rate" type="hidden" id="rate" value="<?php echo $rate; ?>">
                      <input name="amt" type="hidden" id="amt" value="<?php echo $amount; ?>">
                      <input name="s_date" type="hidden" id="s_date" value="<?php echo $s_date; ?>"></td>
			          <td><input name="s_item" type="hidden" id="s_item" value="<?php echo $s_item; ?>"></td>
			          <td><input name="s_time" type="hidden" id="s_time" value="<?php echo $s_time; ?>">
			            <input name="s_by" type="hidden" id="s_by" value="<?php echo $s_by; ?>">
			            <input name="r_no" type="hidden" id="r_no" value="<?php echo $r_no; ?>"></td>
			          <td>&nbsp;</td>
			          <td><input name="batch" type="hidden" id="batch" value="<?php echo $batch; ?>">
		              <input name="p_name" type="hidden" id="p_name" value="<?php echo $p_name; ?>"></td>
			          <td>&nbsp;</td>
			          <td width="28%" align="center">&nbsp;</td>
		            </tr>
			        <tr>
			          <td width="18%" height="30"><strong>Item Name</strong></td>
			          <td width="17%" height="30"><?php echo $item; ?></td>
			          <td width="12%" height="30"><strong>Rate(&#8358;)</strong></td>
			          <td width="6%" height="30" align="right"><?php echo number_format($rate,2); ?></td>
			          <td width="11%" height="30">&nbsp;<strong>Date Sold</strong></td>
			          <td width="8%" height="30"><?php echo $s_date; ?></td>
			          <td width="28%" align="left"><strong>Cashier: </strong><?php echo $s_by; ?></td>
		            </tr>
			        <tr>
			          <td height="30"><strong>Quantity Bought</strong></td>
			          <td height="30"><?php echo $qty; ?></td>
			          <td height="30"><strong>Total Amount(&#8358;)</strong></td>
			          <td height="30" align="right"><?php echo number_format($amount,2); ?></td>
			          <td height="30"><strong>Time</strong></td>
			          <td height="30"><?php echo $s_time; ?></td>
			          <td width="28%" align="left"><textarea name="reason" id="reason" cols="20" rows="3" placeholder = "Reason for return"></textarea></td>
		            </tr>
			        <tr>
			          <td height="30">&nbsp;</td>
			          <td height="30">&nbsp;</td>
			          <td height="30">&nbsp;</td>
			          <td height="30">&nbsp;</td>
			          <td height="30">&nbsp;</td>
			          <td height="30" align="center">&nbsp;</td>
			          <td width="28%" align="center"><input name="submit" class="btn-success" type="submit" id="submit" value="Return"></td>
		            </tr>
		          </table>
		        </form></td>
		      </tr>
		  </table>
			<p>&nbsp;</p>
<p>&nbsp;</p>
            					<div class="bs-example widget-shadow" data-example-id="hoverable-table"></div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; <?php echo date('Y'); ?> FarmKonnect Agribusiness Nigeria Limited. All Rights Reserved </p>
	  </div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript --><script src="js/bootstrap.js"> </script>
	
</body>
</html>