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
	}
		$sql6 = mysql_query("select sum(f_qty) from f_mgt where f_used = '$f_used'");
    while ($row=mysql_fetch_array($sql6)) 
    { 
	$f_qty = $row['0'];
	}

	$sql2 = mysql_query("select sum(quantity) from stocks where category = 'Feeds' and type = '$f_used'");
    while ($row=mysql_fetch_array($sql2)) 
    { 
	$s_qty = $row['0'];
	}
	$fkg = ($s_qty * 25);
	$a_stock = ($fkg - $f_qty);

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


</head> 
<body class="cbp-spmenu-push">
	<p><a href="index.php">Back</a>
</p>
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
                  <td colspan="2" align="center"><span class="cgreen"><strong>DAILY FEEDING HISTORY</strong></span></td>
                </tr>
                <tr>
                  <th>Daily Feeding (Supervisor Record)</th>
                  <th>Daily Feeding (Admin Record)</th>
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
                          <th width="11%">Feed Used</th>
                          <th width="14%">Quantity Used (KG)</th>
                          <th width="14%">Available Stock (KG)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
	 $sql3 = mysql_query("select * from f_mgt order by id desc");
    while ($row=mysql_fetch_array($sql3)) 
    { 
	$sn = $row ['id'];
	$f_date = $row['f_date'];
	$f_time = $row['f_time'];
	$b_type = $row['b_type'];
	$f_used = $row['f_used'];
	$qty = $row['f_qty'];
	$comment = $row['comment'];
		$sql6 = mysql_query("select sum(f_qty) from f_mgt where f_used = '$f_used'");
    while ($row=mysql_fetch_array($sql6)) 
    { 
	$f_qty = $row['0'];
	}

	$sql2 = mysql_query("select sum(quantity) from stocks where category = 'Feeds' and type = '$f_used'");
    while ($row=mysql_fetch_array($sql2)) 
    { 
	$s_qty = $row['0'];
	}
	$fkg = ($s_qty * 25);
	$a_stock = ($fkg - $f_qty);
	?>
                        <tr>
                          <td scope="row"><?php echo $sn; ?></td>
                          <td scope="row"><?php echo $f_date; ?></td>
                          <td><?php echo $f_time; ?></td>
                          <td><?php echo $b_type; ?></td>
                          <td><?php echo $f_used; ?></td>
                          <td align="center"><?php echo $qty; ?></td>
                          <td height="30" align="center"><?php echo $a_stock; ?></td>
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
                          <th width="11%">Feed Used</th>
                          <th width="14%">Quantity Used (KG)</th>
                          <th width="14%">Available Stock (KG)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
	 $sql4 = mysql_query("select * from f_mgt2 order by id desc");
    while ($row=mysql_fetch_array($sql4)) 
    { 
	$mysn = $row ['id'];
	$myf_date = $row['f_date'];
	$myf_time = $row['f_time'];
	$myb_type = $row['b_type'];
	$myf_used = $row['f_used'];
	$myqty = $row['f_qty'];
	$mycomment = $row['comment'];
		$sql6 = mysql_query("select sum(f_qty) from f_mgt2 where f_used = '$myf_used'");
    while ($row=mysql_fetch_array($sql6)) 
    { 
	$myf_qty = $row['0'];
	}

	$sql2 = mysql_query("select sum(quantity) from stocks where category = 'Feeds' and type = '$myf_used'");
    while ($row=mysql_fetch_array($sql2)) 
    { 
	$mys_qty = $row['0'];
	}
	$myfkg = ($mys_qty * 25);
	$mya_stock = ($myfkg - $myf_qty);
	?>
                        <tr class="cred">
                          <td height="30" scope="row"><?php echo $mysn; ?></td>
                          <td height="30" scope="row"><?php echo $myf_date; ?></td>
                          <td><?php echo $myf_time; ?></td>
                          <td><?php echo $myb_type; ?></td>
                          <td><?php echo $myf_used; ?></td>
                          <td align="center"><?php echo $myqty; ?></td>
                          <td align="center"><?php echo $mya_stock; ?></td>
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