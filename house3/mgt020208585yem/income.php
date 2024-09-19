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

 $sql4 = mysql_query("select sum(amount) from sales where p_status = 'PAID' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$o_amt = $row[0];	
	
}

 @ $rpp;        //Records Per Page 
    @ $cps;        //Current Page Starting row number 
    @ $lps;        //Last Page Starting row number 
    @ $a;        //will be used to print the starting row number that is shown in the page 
    @ $b;         //will be used to print the ending row number that is shown in the page 
    
 
    if(empty($_GET["cps"])) 
    { 
        $cps = "0"; 
    } 
    else 
    { 
        $cps = $_GET["cps"]; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $a = $cps+1; 

    $rpp = "5"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='income.php?cps=$lps'><<=</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'><<=</font>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from sales where p_status = 'PAID' and batch = '$batch' and p_name = '$p_name' order by id ASC limit $cps, $rpp "; 
    $rs=mysql_query($q) or die(mysql_error()); 
    $nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysql_query($q0) or die(mysql_error()); 
    $row0=mysql_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
	$_SESSION['score_id'] = $row0['score_id'];
    ///////////////////////////////////////////////////////////////////////
    if (($nr0 < 5) || ($nr < 5)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

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
						| <a href="b_income.php">Back</a></li>
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
			    <td width="69" align="center"><div class="alert alert-success" role="alert"><strong>SUMMARY OF INCOME (<?php echo $p_name; ?>, <?php echo $batch; ?>)</strong></div></td>
		      </tr>
              <tr>
                <td height="30"><strong class="cred">Overall  Amount(&#8358;):</strong><strong class="cgreen"> <?php echo number_format($o_amt,2); ?></strong></td>
              </tr>
              <tr>
                <td height="30">&nbsp;</td>
              </tr>
              <tr>
                <td height="30"><b><font face="verdana" size="1" color="#9999CC"><? echo " $a - $b of $nr0"; ?></font></b></td>
              </tr>
              <tr>
                <td height="30"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
                  <tr>
                    <td width="74" align="center" bgcolor="#F8F8F8"><strong>Date</strong></td>
                    <td width="109" align="center" bgcolor="#F8F8F8"><strong>Sales Item</strong></td>
                    <td width="73" align="center" bgcolor="#F8F8F8"><strong>Qty</strong></td>
                    <td width="50" align="center" bgcolor="#F8F8F8"><strong>Price(&#8358;)</strong></td>
                    <td width="40" align="center" bgcolor="#F8F8F8"><strong>Amount(&#8358;)</strong></td>
                    <td width="41" align="center" bgcolor="#F8F8F8"><strong>Discount(&#8358;)</strong></td>
                  </tr>
                  <?php
  while ($row = mysql_fetch_array($rs)) {
 	$cps = $cps +1;
		$r_no = $row ['r_no'];
		$qty = $row ['quantity'];
		$item = $row ['item'];
		$rate = $row ['rate'];	
		$discount = $row ['discount'];	
		$amount = $row ['amount'];
		$s_date = $row ['s_date'];
 
  ?>
                  <tr>
                    <td bgcolor="#F8F8F8"><?php echo $s_date; ?></td>
                    <td bgcolor="#F8F8F8"><?php echo $item; ?></td>
                    <td align="center" bgcolor="#F8F8F8"><?php echo $qty; ?></td>
                    <td align="right" bgcolor="#F8F8F8"><?php echo number_format($rate, 2); ?></td>
                    <td align="right" bgcolor="#F8F8F8"><?php echo number_format($amount, 2); ?></td>
                    <td align="right" bgcolor="#F8F8F8"><?php echo number_format($discount, 2); ?></td>
                  </tr>
                  <?php } ?>
                </table></td>
              </tr>
              <tr>
                <td height="30" align="center"><span class="cred">
                  <?
                if (!mysql_num_rows($rs)){
				echo "No record found!";
				} 
				?>
                </span></td>
      </tr>
              <tr>
                <td height="30"><span class="updates">
                  <?   echo "$prv"; 

    ///////////////////////////////////////////////////////////////////////////////// 
    
    if ($cps == $nr0) 
    {      
        echo "  |  <font color='CCCCCC'>=>></font>"; 
    } 
    else 
    { 
        if ($nr0 > 5) 
	
        { 
		
            echo "  |  <a href='income.php?cps=$cps&lps=$lps'>=>></a>"; 
        } 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
    ?>
                </span></td>
              </tr>
      
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