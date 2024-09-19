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
$c_name = $_SESSION['c_name'];
$amt_pd = $_SESSION['amt_pd'];
$discount = $_SESSION['discount'];
$p_name = $_SESSION['p_name'];
$batch = $_SESSION['batch'];
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

*/
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>ERP System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">




    </head>

    <body>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#F8F8F8" class="msg"></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">FarmKonnect Agribusiness Nigeria Limited</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">69, Ashi Road, Ashi-Bodija, Ibadan, Oyo State</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">+23480XXXXXXXX</span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#F8F8F8"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="32%"><span class="receipt">Receipt No:</span></td>
            <td width="68%"><span class="receipt"><?php echo $r_no; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Date:</span></td>
            <td><span class="receipt"><?php echo $s_date; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Cashier:</span></td>
            <td><span class="receipt"><?php echo $name; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Sold to:</span></td>
            <td><span class="receipt"><?php echo $c_name; ?></span></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><span class="receipt">QTY</span></td>
                <td align="center"><span class="receipt">ITEM</span></td>
                <td align="center"><span class="receipt">PRICE(&#8358;)</span></td>
                <td align="center"><span class="receipt">AMOUNT(&#8358;)</span></td>
              </tr>
              <?php
		 $sql3 = mysql_query("select * from sales where r_no = '$r_no' and batch = '$batch' and p_name = '$p_name'");
		while ($row = mysql_fetch_array($sql3)) {	
		$id = $row ['id'];
		$qty = $row ['quantity'];
		$item = $row ['item'];
		$rate = $row ['rate'];	
		$amount = $row ['amount'];
$sql4 = mysql_query("select sum(amount) from sales where r_no = '$r_no' and batch = '$batch' and p_name = '$p_name'");
while ($row = mysql_fetch_array($sql4)) {
$t_amt = $row[0];	
	
}
//$t_bal = ($t_amt - $discount);
			//$balance = ($amt_pd - $t_bal);
			$balance = ($amt_pd - $t_amt);
	 
		 ?>
              <tr>
                <td align="center"><span class="receipt"><?php echo $qty; ?></span></td>
                <td><span class="receipt"><?php echo $item; ?></span></td>
                <td align="right"><span class="receipt"><?php echo number_format($rate,2); ?></span></td>
                <td align="right"><span class="receipt"><?php echo number_format($amount, 2); ?></span></td>
              </tr>
              <?php } ?>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="receipt"><img src="images/rec.png" width="20" height="9" border="0" usemap="#Map"></td>
            <td align="right"><span class="receipt">Total (&#8358;): <?php echo number_format($t_amt, 2); ?></span></td>
          </tr>
          
          <tr>
            <td align="left" class="receipt">&nbsp;</td>
            <td align="right"><span class="receipt">Amount Paid (&#8358;): <?php echo number_format($amt_pd, 2); ?></span></td>
          </tr>
          <tr>
            <td align="left" class="receipt">&nbsp;</td>
            <td align="right"><span class="receipt">Change Due (&#8358;): <?php echo number_format($balance, 2); ?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25" align="left" bgcolor="#F8F8F8" class="receipt">&nbsp;</td>
      </tr>
    </table>
<map name="Map">
  <area shape="rect" coords="3,1,17,8" href="sales.php">
  </map>
<script type="text/javascript" language="javascript">
//<![CDATA[
// Do print the page
window.onload = function()
{
    if (typeof(window.print) != 'undefined')
	{
        window.print();
    }
}
//]]>
</script>
</body>

</html>

