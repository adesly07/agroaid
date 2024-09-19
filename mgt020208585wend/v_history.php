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
/*	 $b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}

*/////////
if (isset($_GET['id']))
	{
		$id = $_GET['id'];
				
		$sql = "DELETE FROM v_mgt2 WHERE id ='$id'";
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
<style type="text/css">
.cred{color:#F00;}
.cgreen{color:#060;}

</style>

<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />

	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
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
	<p><a href="index.php">Back</a> | <a href="history.php">Daily Feeding</a> | <a href="m_history.php">Medication</a> | <strong>Vaccination</strong></p>
	<p>
	  <!-- side nav js -->
	  <!-- Bootstrap Core JavaScript -->
</p>
  <div class="col-md-12  widget-shadow">
      <div class="panel-default">
        <div class="inbox-page">
          <div class="cgreen"></div>
          
          <div class="bs-example widget-shadow" data-example-id="hoverable-table">
            <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table table-hover">
              <thead>
                <tr>
                  <td colspan="2" align="center"><span class="cgreen"><strong>VACCINATION HISTORY</strong></span></td>
                </tr>
                <tr>
                  <th>Vaccination (Supervisor Record)</th>
                  <th>Vaccination (Admin Record)</th>
                </tr>
                <tr>
                  <td width="9%"> <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="4%">ID</th>
                          <th width="5%">Date</th>
                          <th width="9%">Time</th>
                          <th width="13%">Type of Bird</th>
                          <th width="11%">Vaccine Used</th>
                          <th width="11%">Qty Used</th>
                          <th width="11%">Available Stock</th>
                          <th width="14%">Apply to</th>
                          <th width="14%">Nos. of Bird</th>
                          <th width="14%">Pen</th>
                          <th width="14%">Batch</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
	 $sql3 = mysql_query("select * from v_mgt order by id desc limit 30 ");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$v_date = $row['v_date'];
	$v_time = $row['v_time'];
	$b_type = $row['b_type'];
	$v_used = $row['v_used'];
	$applyto = $row['apply_to'];
	$b_no = $row['b_no'];
	$comment = $row['comment'];
	$p_name = $row['p_name'];
	$batch = $row['p_name'];
	$qty = $row['quantity'];
	$a_stock = $row['a_stock'];
	?>
                        <tr>
                          <td align="center" scope="row"><?php echo $sn; ?></td>
                          <td scope="row"><?php echo $v_date; ?></td>
                          <td><?php echo $v_time; ?></td>
                          <td><?php echo $b_type; ?></td>
                          <td><?php echo $v_used; ?></td>
                          <td align="center"><?php echo $qty; ?></td>
                          <td height="30" align="center"><?php echo $a_stock; ?></td>
                          <td align="center"><?php echo $applyto; ?></td>
                          <td height="30" align="center"><?php echo $b_no; ?></td>
                          <td align="center"><?php echo $p_name; ?></td>
                          <td align="center"><?php echo $batch; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  </td>
                  <td width="9%"> <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="4%">ID</th>
                          <th width="5%">Date</th>
                          <th width="9%">Time</th>
                          <th width="13%">Type of Bird</th>
                          <th width="11%">Vaccine Used</th>
                          <th width="11%">Qty Used</th>
                          <th width="11%">Available Stock</th>
                          <th width="14%">Apply to</th>
                          <th width="14%">Nos. of Bird</th>
                          <th width="14%">Pen</th>
                          <th width="14%">Batch</th>
                          <th width="4%">&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
	 $sql4 = mysql_query("select * from v_mgt2 order by id desc limit 30");
    while ($row=mysql_fetch_array($sql4)) 
    { 
	$mysn = $row ['id'];
	$myv_date = $row['v_date'];
	$myv_time = $row['v_time'];
	$myb_type = $row['b_type'];
	$myv_used = $row['v_used'];
	$myapp = $row['apply_to'];
	$myb_no = $row['b_no'];
	$mycomment = $row['comment'];
	$myp_name = $row['p_name'];
	$mybatch = $row['batch'];
	$myqty = $row['quantity'];
	$mya_stock = $row['a_stock'];
	?>
                        <tr class="cred">
                          <td height="30" scope="row" align="center"><?php echo $mysn; ?></td>
                          <td height="30" scope="row"><a href="v_vacc.php?id=<?php echo $mysn; ?>" rel="facebox"><?php echo $myv_date; ?></a></td>
                          <td><?php echo $myv_time; ?></td>
                          <td><?php echo $myb_type; ?></td>
                          <td><?php echo $myv_used; ?></td>
                          <td align="center"><?php echo $myqty; ?></td>
                          <td height="30" align="center"><?php echo $mya_stock; ?></td>
                          <td align="center"><?php echo $myapp; ?></td>
                          <td align="center"><?php echo $myb_no; ?></td>
                          <td align="center"><?php echo $myp_name; ?></td>
                          <td align="center"><?php echo $mybatch; ?></td>
                          <td align="center"><a href="v_history.php?id=<?php echo $mysn; ?>" onClick="return check_deletion()"><img src="images/delete.png" width="16" height="16"></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div></td>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
   
</body>
</html>