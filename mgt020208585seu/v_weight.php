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
/*	 $b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}
*/
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
        $prv =  "<a href='v_weight.php?cps=$lps'><<=</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'><<=</font>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from weight order by 'id' ASC limit $cps, $rpp "; 
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

if (isset($_GET['id']))
	{
		$id = $_GET['id'];
				
		$sql = "DELETE FROM weight WHERE id ='$id'";
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
						| <a href="index.php">Back</a> </li>                    </ul>
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
			    <td align="center"><div class="alert alert-success" role="alert"><span class="stock"><strong>WEIGHT MANAGEMENT </strong></span></div></td>
		      </tr>
              <tr>
			    <td width="69" height="30"><table width="100%" border="0">
			      <tr>
			        <td valign="top"><b><font face="verdana" size="1" color="#9999CC"><? echo " $a - $b of $nr0"; ?></font></b></td>
		          </tr>
			      <tr>
			        <td width="76%" valign="top"><table width="979" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-hover">
			          <tr>
			            <td align="center"><strong>#</strong></td>
			            <td height="30" align="center"><strong>Chicks Name</strong></td>
			            <td align="center"><strong>Pen</strong></td>
			            <td align="center"><strong>Batch</strong></td>
			            <td align="center"><strong>Age in Day(s)</strong></td>
			            <td align="center"><strong>Average Weight (kg)</strong></td>
			            <td align="center"><strong>FCR</strong></td>
			            <td width="93" align="center"><strong>Comment</strong></td>
			            <td width="68" align="center"><strong>Added By</strong></td>
			            <td width="47" align="center"><strong>Date</strong></td>
		              </tr>
			          <?php
	// $sql3 = mysql_query("select * from weight where batch = '$batch' order by id desc");
    while ($row=mysql_fetch_array($rs)) 
    { 
	$cps = $cps + 1;
	$sn = $row ['id'];
	$myc_type = $row['c_type'];
	$myp_name = $row['p_name'];
	$myage = $row['age'];
	$myweight = $row['weight'];
	$mys_by = $row['c_by'];
	$mycomment = $row['comment'];
	$mys_date = $row['s_date'];
	$mybatch = $row['batch'];
	$myt_fcr = $row['t_fcr'];
	?>
			          <tr>
			            <td width="44" align="center"><?php echo $cps; ?></td>
			            <td width="126" height="30"><?php echo $myc_type; ?></td>
			            <td width="43" height="30"><?php echo $myp_name; ?></td>
			            <td width="96"><?php echo $mybatch; ?></td>
			            <td width="165" align="center"><?php echo $myage; ?></td>
			            <td width="165" align="center"><?php echo $myweight; ?></td>
			            <td width="110" align="center" class="cgreen"><?php echo round($myt_fcr,1); ?>:1</td>
			            <td align="left"><?php echo $mycomment; ?></td>
			            <td align="left"><?php echo $mys_by; ?></td>
			            <td align="center"><?php echo $mys_date; ?></td>
		              </tr>
			          <?php } ?>
		            </table></td>
		          </tr>
			      <tr>
			        <td align="center" valign="top"><span class="cred">
			          <?
                if (!mysql_num_rows($rs)){
				echo "No record found!";
				} 
				?>
			        </span></td>
		          </tr>
			      <tr>
			        <td valign="top"><span class="updates">
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
		
            echo "  |  <a href='v_weight.php?cps=$cps&lps=$lps'>=>></a>"; 
        } 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
    ?>
			        </span></td>
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