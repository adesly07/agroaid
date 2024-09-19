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
require('../library.php');
require('../database.php');

$sql1 = "SELECT DISTINCT(b_name)
		FROM batch order by id asc";
		$result4 = mysql_query($sql1) or die(mysql_error());
$sql2 = "SELECT DISTINCT(p_name)
		FROM pen order by id asc";
		$result2 = mysql_query($sql2) or die(mysql_error());

$submit = $_POST['Submit'];
if($submit == "Add")
{  // text1
	$pen = $_POST['p_name'];
	$batch = $_POST['batch'];
	$s_date = date('d/m/Y');
$ip = getenv("REMOTE_ADDR");
$sql4 = mysql_query("select * from u_batch where p_name = '$pen' and batch = '$batch'");
if(mysql_num_rows($sql4)) {
$msg = "Record Already Exist. Try Again";
} else {
$sql2 = mysql_query ("insert into u_batch set p_name = '$pen', batch = '$batch', s_date = '$s_date', c_by = '$name', ip = '$ip'");
if ($sql2) {
$msg = "Record Added Successfully";
} else {
//die(mysql_error());
$msg = "Error In Adding Record";
}
}
}

if (isset($_GET['id']))
	{
		$id = $_GET['id'];
				
		$sql = "DELETE FROM u_batch WHERE id ='$id'";
		$result = @mysql_query($sql);
		if (!$result) die( "query error ". mysql_error());
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
							| <a href="index.php">Back</a>
						</li>
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
			<div class="main-page signup-page">
				<h2 class="title1">Update Batch</h2>
				<div class="sign-up-row widget-shadow">
<div class="alert alert-success" role="alert">
<strong><?php echo $msg;?></strong></div>
<form action="u_batch.php" method="post" enctype="multipart/form-data">
                   <p><strong>Select Pen</strong></p>
         <p><span class="sign-u">
           <select name="p_name" id="p_name" class="form-control">
             <?php 
			while($data = dbFetchAssoc($result2)){
			?>
             <option value="<?php echo $data['p_name']; ?>"><?php echo $data['p_name']; ?></option>
             <?php 
			}//while
			?>
           </select>
         </span></p>
         <p>&nbsp;</p>

          <p><strong>Select Batch</strong></p>
          <p><span class="sign-u">
            <select name="batch" id="batch" class="form-control">
              <?php 
			while($data = dbFetchAssoc($result4)){
			?>
              <option value="<?php echo $data['b_name']; ?>"><?php echo $data['b_name']; ?></option>
              <?php 
			}//while
			?>
            </select>
          </span>`</p>
<div class="sub_home">
<input type="submit" name="Submit" value="Add">
				<div class="clearfix"> </div>
		  </div>
					<div class="registration">
						+++
	    </div>
				</form>
				</div>
			</div>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		  <p>&nbsp;</p>
            
			<table width="400" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
			  <tr>
			    <td colspan="6" align="center"><div class="alert alert-success" role="alert"><strong>Batch Update</strong></div></td>
		      </tr>
			  <tr>
			    <td align="left"><strong>Pen</strong></td>
			    <td height="30" align="left"><strong>Batch </strong></td>
			    <td width="35" align="center"><strong>Date</strong></td>
			    <td width="64" align="left"><strong>Created By</strong></td>
			    <td width="64" align="left">&nbsp;</td>
			    <td width="64" align="left">&nbsp;</td>
		      </tr>
						  <?php
	 $sql3 = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$mypen = $row['p_name'];
	$mybatch = $row['batch'];
	$mys_date = $row['s_date'];
	$myc_by = $row['c_by'];
	$myip = $row['ip'];
	
	?>
  <tr>
    <td width="83"><?php echo $mypen; ?></td>
			    <td width="67" height="30"><?php echo $mybatch; ?></td>
			    <td width="35" align="center"><?php echo $mys_date; ?></td>
	      <td align="left"><?php echo $myc_by; ?></td>
	      <td align="center"><a href="e_batch.php?id=<?php echo $sn; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a></td>
	      <td align="center"><a href="u_batch.php?id=<?php echo $sn; ?>" onClick="return check_deletion()"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete record"></i></a></td>
		      </tr>
			  <?php } ?>
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
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
</body>
</html>