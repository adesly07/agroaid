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
/////////////
$p_name = $_SESSION['p_name'];
$batch = $_SESSION['batch'];

/*$sql2 = mysql_query("select sum(t_amt) from stocks where category = 'Chicks' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql2)) {
$c_amt = $row[0];	
	
}
$sql4 = mysql_query("select sum(t_amt) from stocks where category = 'Feeds' and batch = '$batch'");
while ($row = mysql_fetch_array($sql4)) {
$f_amt = $row[0];	
	
}
$sql6 = mysql_query("select sum(t_amt) from stocks where category = 'Vaccine' and batch = '$batch'");
while ($row = mysql_fetch_array($sql6)) {
$v_amt = $row[0];	
	
}
$sql8 = mysql_query("select sum(t_amt) from stocks where category = 'Medication' and batch = '$batch'");
while ($row = mysql_fetch_array($sql8)) {
$m_amt = $row[0];	
	
}
$sql10 = mysql_query("select sum(t_amt) from stocks where category = 'Miscellaneous' and batch = '$batch'");
while ($row = mysql_fetch_array($sql10)) {
$misc_amt = $row[0];	
	
}

$o_amt = ($c_amt + $f_amt + $v_amt + $m_amt + $misc_amt);
*/
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
<?php include ('menu.php'); ?>   
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
						| <a href="b_expenses.php">Back</a></li>
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
			    <td width="69" align="center"><div class="alert alert-success" role="alert"><strong>SUMMARY OF EXPENSES (<?php echo $p_name; ?>, <?php echo $batch; ?>)</strong></div></td>
		      </tr>
              <tr>
                <td height="30"><strong class="cred">CHICKS</strong></td>
              </tr>
              <tr>
                <td height="30"><table width="600" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
                  <tr>
                    <td height="30" align="center"><strong>Chicks Name</strong></td>
                    <td align="center"><strong>Age</strong></td>
                    <td align="center"><strong>Quantity</strong></td>
                    <td width="131" align="center"><strong>Unit Price(&#8358;)</strong></td>
                    <td width="140" align="center"><strong>Total Amount(&#8358;)</strong></td>
                  </tr>
                  <?php
	 $sql1 = mysql_query("select * from stocks where category = 'Chicks'and batch = '$batch' and p_name = '$p_name'");
    while ($row=mysql_fetch_array($sql1)) 
    { 
	$sn = $row ['id'];
	$mytype = $row['type'];
	$myage = $row['unit'];
	$myqty = $row['quantity'];
	$myprice = $row['u_price'];
	$myp_name = $row['p_name'];
	$t_amt = $row['t_amt'];
	$mys_date = $row['s_date'];
$sql2 = mysql_query("select sum(t_amt) from stocks where category = 'Chicks' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql2)) {
$c_amt = $row[0];	
	
}

	
	?>
                  <tr>
                    <td width="216" height="30"><?php echo $mytype; ?></td>
                    <td width="119" height="30" align="center"><?php echo $myage; ?></td>
                    <td width="131" align="left"><?php echo $myqty; ?></td>
                    <td align="right"><?php echo number_format($myprice,2); ?></td>
                    <td align="right"><?php echo number_format($t_amt,2); ?></td>
                  </tr>
                  <?php } ?>
                </table></td>
              </tr>
              <tr>
                <td height="30" align="right">&nbsp;</td>
      </tr>
              <tr>
                <td height="30"><strong class="cred">FEEDS</strong></td>
              </tr>
              <tr>
                <td height="30" align="left"><table width="600" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
                  <tr>
                    <td height="30" align="center"><strong>Feed Name</strong></td>
                    <td align="center"><strong>Quantity/kg</strong></td>
                    <td width="133" align="center"><strong>Unit Price/kg(&#8358;)</strong></td>
                    <td width="139" align="center"><strong>Total Amount(&#8358;)</strong></td>
                  </tr>
                  <?php
	 $sql3 = mysql_query("select * from stocks where category = 'Feeds'");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$mytype = $row['type'];
	$u_price = $row['u_price'];

$sql4 = mysql_query("select sum(f_qty) from f_mgt where f_used = '$mytype' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$f_qty = $row[0];		
}

$myprice = ($u_price/25);
$f_amt = ($f_qty * $myprice);

	?>
                  <tr>
                    <td width="269" height="30"><?php echo $mytype; ?></td>
                    <td width="140" align="left"><?php echo $f_qty; ?></td>
                    <td align="right"><?php echo number_format($myprice,2); ?></td>
                    <td align="right"><?php echo number_format($f_amt,2); ?></td>
                  </tr>
                  <?php } ?>
                </table></td>
              </tr>
              <tr>
                <td height="30" align="right">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left"><strong class="cred">VACCINES</strong></td>
              </tr>
              <tr>
                <td height="30" align="left"><table width="600" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
                  <tr>
                    <td height="30" align="center"><strong>Vaccine Name</strong></td>
                    <td align="center"><strong>Quantity/unit</strong></td>
                    <td width="120" align="center"><strong>Unit Price(&#8358;)</strong></td>
                    <td width="148" align="center"><strong>Total Amount(&#8358;)</strong></td>
                  </tr>
                  <?php
	 $sql5 = mysql_query("select * from stocks where category = 'Vaccine'");
    while ($row=mysql_fetch_array($sql5)) 
    { 
	$sn = $row ['id'];
	$mytype = $row['type'];
	$u_price = $row['u_price'];
	$amt = $row['t_amt'];
	$unit = $row['unit'];
$sql4 = mysql_query("select sum(quantity) from v_mgt where v_used = '$mytype' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$v_qty = $row[0];		
}
$myprice = ($amt / $unit);
$v_amt = ($v_qty * $myprice);
	?>
                  <tr>
                    <td width="261" height="30"><?php echo $mytype; ?></td>
                    <td width="162" align="left"><?php echo $v_qty; ?></td>
                    <td align="right"><?php echo number_format($myprice,2); ?></td>
                    <td align="right"><?php echo number_format($v_amt,2); ?></td>
                  </tr>
                  <?php } ?>
                </table></td>
              </tr>
              <tr>
                <td height="30" align="right">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="left"><strong class="cred">MEDICATIONS</strong></td>
              </tr>
              <tr>
                <td height="30" align="left"><table width="600" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
                  <tr>
                    <td height="30" align="center"><strong>Medicine Name</strong></td>
                    <td align="center"><strong>Quantity/unit</strong></td>
                    <td width="105" align="center"><strong>Unit Price(&#8358;)</strong></td>
                    <td width="149" align="center"><strong>Total Amount(&#8358;)</strong></td>
                  </tr>
                  <?php
	 $sql5 = mysql_query("select * from stocks where category = 'Medication'");
    while ($row=mysql_fetch_array($sql5)) 
    { 
	$sn = $row ['id'];
	$mytype = $row['type'];
	$u_price = $row['u_price'];
	$amt = $row['t_amt'];
	$unit = $row['unit'];
$sql4 = mysql_query("select sum(quantity) from m_mgt where m_used = '$mytype' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$m_qty = $row[0];		
}
$myprice = ($amt / $unit);
$m_amt = ($m_qty * $myprice);
	
	?>
                  <tr>
                    <td width="319" height="30"><?php echo $mytype; ?></td>
                    <td width="106" align="left"><?php echo $m_qty; ?></td>
                    <td align="right"><?php echo number_format($myprice,2); ?></td>
                    <td align="right"><?php echo number_format($m_amt,2); ?></td>
                  </tr>
                  <?php } ?>
                </table></td>
              </tr>
              <tr>
                <td height="30" align="right">&nbsp;</td>
              </tr>
      <?php
	  
$o_amt = ($c_amt + $f_amt + $v_amt + $m_amt);
	  
	  ?>
              <tr>
                <td height="30" align="left"><strong class="cred">Overall  Amount(&#8358;):</strong><strong class="cgreen"> <?php echo number_format($o_amt,2); ?></strong></td>
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