<?php
include ('../uconx.php');

if(!isset($_session))
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$s_date = $_SESSION['s_date'];
$r_no = $_SESSION['r_no'];
$day = $_SESSION['day'];
$month = $_SESSION['month'];
$year = $_SESSION['year'];
$p_name = $_SESSION['p_name'];
$batch = $_SESSION['batch'];

$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
while ($row = mysql_fetch_array($sql)) {
$name = $row['name'];	
}
/////////////
/*	 $b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}
*/

$submit = $_POST['submit'];
if ($submit == "OK")
{  // text1
$search = $_POST['search'];
$sql1 = mysql_query("select * from stock_items where item = '$search'");
while ($row = mysql_fetch_array($sql1)) {
	$id = $row ['id'];  
	$mys_item = $row['s_item'];
	$myitem = $row['item'];
	$mysize = $row['size'];
	$myqty = $row['quantity'];
	$myprice = $row['amount'];
	$_SESSION['id'] = $id;
	$_SESSION['s_item'] = $mys_item;
	$_SESSION['item'] = $myitem;
	$_SESSION['size'] = $mysize;
	$_SESSION['amount'] = $myprice;
}
}
$mys_item = $_SESSION['s_item'];
$myitem = $_SESSION['item'];
$mysize = $_SESSION['size'];
$myprice = $_SESSION['amount'];
$search = $_SESSION['search'];
$myqty = $_SESSION['quantity'];
//$qty = $_SESSION['qty'];

//Qty B4 Sales
$s_qty1 = mysql_query("select sum(quantity) from stock_items where item = '$myitem' and s_status = 'STORED' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($s_qty1)) {
$t_qty1 = $row[0];
//Qty After Sales
$s_qty2 = mysql_query("select sum(quantity) from sales where item = '$myitem' and p_status = 'PAID' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($s_qty2)) {
$t_qty2 = $row[0];
$a_qty = ($t_qty1 - $t_qty2);
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
		<script language="JavaScript">
	function check_deletion()
	{
		if (confirm("Are you sure you want to delete this record?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search2.php",
		minLength: 1
	});				

});
</script>

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
						| <a href="d_sales.php">Back</a> | <a href="d_sales.php">Clear Active Sales </a></li>
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
			    <td align="center"><div class="alert alert-success" role="alert"><span class="stock"><strong>SALES AS AT <?php echo $s_date; ?></strong></span></div></td>
		      </tr>
			  <tr>
			    <td height="30" align="left"><table width="500" border="0" cellspacing="0" cellpadding="0" class="table table-hover">
			      <tr>
			        <td><form name="form1" method="post" action="sales.php">
			          <input type="text" id="search" name="search"  placeholder = "Search Item" class="auto" autofocus="autofocus">
			          <input name="submit" class="btn-success" type="submit" id="submit" value="OK">
			          </form></td>
		          </tr>
		        </table></td>
		      </tr>
              <tr>
                <td height="30"><strong class="cred">Sales Item Details</strong></td>
              </tr>
              <tr>
                <td height="30"><form name="form2" method="post" action="process.php">
                  <table width="100%" border="0" class="table table-hover">
                    <tr>
                      <td width="250" height="30">Item Name</td>
                      <td width="211" height="30"><?php echo $myitem; ?></td>
                      <td width="169" height="30">Price/kg</td>
                      <td width="170"><?php echo $myprice; ?></td>
                      <td width="341">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30">Quantity Aval</td>
                      <td height="30"><?php echo $a_qty; ?></td>
                      <td height="30">Quantity</td>
                      <td height="30"><input name="qty" type="text" id="qty" size="10" required="required"></td>
                      <td width="341">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30">Quantity Sold</td>
                      <td height="30"><?php echo $t_qty2; ?></td>
                      <td height="30">Discount</td>
                      <td height="30"><input name="discount" type="text" id="discount" size="10" placeholder = "Discount in Naira"></td>
                      <td width="341"><input name="submit2" class="btn-success" type="submit" id="submit2" value="Add to Cart"></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
              <tr>
                <td height="30"><strong class="cred">LIST OF ORDERS FOR RECEIPT NO: <?php echo $r_no; ?></strong></td>
              </tr>
              <tr>
			    <td width="69" height="30"><table width="100%" border="0">
			      <tr>
			        <td colspan="2" valign="top"><table width="90%" border="1" cellspacing="0" cellpadding="0">
			          <tr>
			            <td align="center"><strong>QTY</strong></td>
			            <td align="center"><strong>ITEM</strong></td>
			            <td align="center"><strong>PRICE(&#8358;)</strong></td>
			            <td align="center"><strong>AMOUNT(&#8358;)</strong></td>
			            <td>&nbsp;</td>
		              </tr>
			          <?php
		 $sql3 = mysql_query("select * from sales where r_no = '$r_no' and p_status = 'PAID' and batch = '$batch' and p_name = '$p_name'");
		while ($row = mysql_fetch_array($sql3)) {	
		$sn = $row ['id'];
		$qty = $row ['quantity'];
		$item = $row ['item'];
		$rate = $row ['rate'];	
		$amount = $row ['amount'];
$sql4 = mysql_query("select sum(amount) from sales where r_no = '$r_no' and p_status = 'PAID' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$t_amt = $row[0];	
	
}
		 
		 ?>
			          <tr>
			            <td height="30" align="center"><?php echo $qty; ?></td>
			            <td height="30"><?php echo $item; ?></td>
			            <td height="30" align="right"><?php echo number_format($rate,2); ?></td>
			            <td height="30" align="right"><?php echo number_format($amount, 2); ?></td>
			            <td height="30" align="center"><a href="process.php?id=<?php echo $sn; ?>" onClick="return check_deletion()"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete record"></i></a></td>
		              </tr>
			          <?php } ?>
		            </table></td>
			        <td width="24%" valign="top"><form name="form3" method="post" action="process2.php">
			          <p><strong>Customer Name</strong><br>
			            <input name="c_name" type="text" id="c_name" value="Cash Customer">
			          </p>
			          <p>&nbsp; </p>
			          <p>
			            <input name="amt_pd" type="text" id="amt_pd" placeholder = "Amount Paid">
		              </p>
			          <p>&nbsp;</p>
			          <p><span class="msg">
			            <input name="submit3" class="btn-success" type="submit" id="submit3" value="Print Receipt">
		              </span></p>
		            </form></td>
		          </tr>
			      <tr>
			        <td width="68%" align="right"><strong class="cred">TOTAL AMOUNT(&#8358;):</strong> <strong class="cgreen"><?php echo number_format($t_amt, 2); ?></strong></td>
			        <td width="8%" align="right">&nbsp;</td>
			        <td valign="top">&nbsp;</td>
		          </tr>
			      <tr>
			        <td colspan="2"><span class="cred">
			          <?
                if (!mysql_num_rows($sql3)){
				echo "No order found!";
				} 
				?>
			        </span></td>
			        <td valign="top">&nbsp;</td>
		          </tr>
		        </table></td>
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