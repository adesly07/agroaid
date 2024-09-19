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

////////////
/*$b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}
*/

$id = $_REQUEST['id'];
	 $sql3 = mysql_query("select * from f_mgt where id = '$id'");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$f_date = $row['f_date'];
	$f_time = $row['f_time'];
	$b_type = $row['b_type'];
	$f_used = $row['f_used'];
	$qty = $row['f_qty'];
	$comment = $row['comment'];
	$a_stock = $row['a_stock'];
	$p_name = $row['p_name'];
	$batch = $row['batch'];
	$c_day = $row['day'];
	$m_rate = $row['mortality'];
}

	$sql1 = mysql_query("select sum(mortality) from f_mgt where batch = '$batch' and p_name = '$p_name'");
	while ($row = mysql_fetch_array($sql1)) {
		$mortal = $row[0];	
	}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>ERP System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ERP SYATEM" />
</head> 
<body class="cbp-spmenu-push">
	<!-- side nav js -->
	<!-- Bootstrap Core JavaScript -->
   <div class="col-md-12  widget-shadow">
      <div class="panel-default">
        <div class="inbox-page">
          <div class="cgreen"><strong>Daily Feeding</strong></div>
          
          <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <table width="95%" border="1" cellpadding="0" cellspacing="0" class="table table-hover"> <thead> <tr> <th width="28%" height="30"><strong>Date</strong></th>
    <td width="72%" height="30" align="left"><?php echo $f_date; ?></td>
						</tr> 
					    </thead> <tbody>
    			<tr> <td height="30" scope="row"><strong>Time</strong></td>
           <td height="30" align="left"><?php echo $f_time; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Pen</strong></td>
                           <td height="30" align="left"><?php echo $p_name; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Batch</strong></td>
                           <td height="30" align="left"><?php echo $batch; ?></td>
                         </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Type Of Bird</strong></td>
                           <td height="30" align="left"><?php echo $b_type; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Feed Used</strong></td>
                           <td height="30" align="left"><?php echo $f_used; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Quantity Used(KG)</strong></td>
                           <td height="30" align="left"><?php echo $qty; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Available Stock(KG)</strong></td>
                           <td height="30" align="left"><?php echo $a_stock; ?></td>
                          </tr>
                         <tr>
                           <td height="30" valign="top" scope="row"><strong>Mortal Rate (<span class="cred"><?php echo $mortal; ?></span>)</strong></td>
                           <td height="30" align="left" class="cred"><?php echo $m_rate; ?></td>
                         </tr>
                         <tr>
                           <td height="30" valign="top" scope="row"><strong>Farm Manager(s) on Duty</strong></td>
                           <td height="30" align="left"><table width="100%" border="0" class="table table-hover">
                             <tr>
                                 <td></td>
                             </tr>
                              <?php
	 $sql1 = mysql_query("select * from f_scheduling where s_day = '$c_day'");
    while ($row = mysql_fetch_array($sql1)) 
    { 
	$mym_name = $row['m_name'];
	
							  
							  ?>
                               <tr>
                                 <td height="19"><?php echo $mym_name; ?></td>
                               </tr>
                               <?php } ?>
                           </table></td>
                         </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Supervisor's Comment</strong></td>
                           <td height="30" align="left"><?php echo $comment; ?></td>
                          </tr> 
                         </tbody> </table>
          </div>
        </div>
      </div>
</div>
   
</body>
</html>