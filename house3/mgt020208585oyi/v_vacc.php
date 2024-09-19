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
	 $sql3 = mysql_query("select * from v_mgt2 where id = '$id'");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$v_date = $row['v_date'];
	$v_time = $row['v_time'];
	$b_type = $row['b_type'];
	$v_used = $row['v_used'];
	$app = $row['apply_to'];
	$b_no = $row['b_no'];
	$comment = $row['comment'];
	$p_name = $row['p_name'];
	$batch = $row['batch'];
	$c_day = $row['day'];
	$qty = $row['quantity'];
	$a_stock = $row['a_stock'];
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
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<!-- side nav js -->
	<!-- Bootstrap Core JavaScript -->
   <div class="col-md-12  widget-shadow">
      <div class="panel-default">
        <div class="inbox-page">
          <div class="cgreen"><strong>Vaccination</strong></div>
          
          <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <table width="95%" border="1" cellpadding="0" cellspacing="0" class="table table-hover"> <thead> <tr> <th width="38%" height="30" align="left"><strong>Date</strong></th>
<td width="62%" height="30" align="left"><?php echo $v_date; ?></td>
						</tr> 
					    </thead> <tbody>
    			<tr> <td height="30" scope="row"><strong>Time</strong></td>
           <td height="30" align="left"><?php echo $v_time; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Pen</strong></td>
                           <td height="30" align="left"><?php echo $p_name; ?></td>
                          </tr>
                           <tr>
                             <td height="30" scope="row"><strong>Batch</strong></td>
                             <td height="30" align="left"><?php echo $batch; ?></td>
                           </tr>
                           <td height="30" scope="row"><strong>Type Of Bird</strong></td>
                           <td height="30" align="left"><?php echo $b_type; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Vaccine Used</strong></td>
                           <td height="30" align="left"><?php echo $v_used; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Quantity Used</strong></td>
                           <td height="30" align="left"><?php echo $qty; ?></td>
                         </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Available Stock</strong></td>
                           <td height="30" align="left"><?php echo $a_stock; ?></td>
              </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Apply To</strong></td>
                           <td height="30" align="left"><?php echo $app; ?></td>
                          </tr>
                         <tr>
                           <td height="30" scope="row"><strong>Nos. of Bird</strong></td>
                           <td height="30" align="left"><?php echo $b_no; ?></td>
                          </tr>
                         <tr>
                           <td height="30" valign="top" scope="row"><strong>Farm Manager(s) on Duty</strong></td>
                           <td height="30" align="left" valign="top"><table width="100%" border="0">
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
                           <td height="30" align="left" valign="top"><?php echo $comment; ?></td>
                          </tr> 
                         </tbody> </table>
          </div>
        </div>
      </div>
</div>
   
</body>
</html>