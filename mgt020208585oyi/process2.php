<?php
include ('../uconx.php');

if(!isset($_session))
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$s_date = $_SESSION['s_date'];
$day = $_SESSION['day'];
$month = $_SESSION['month'];
$year = $_SESSION['year'];
$p_name = $_SESSION['p_name'];
$batch = $_SESSION['batch'];
$r_no = $_SESSION['r_no'];
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

$mys_item = $_SESSION['s_item'];
$myitem = $_SESSION['item'];
$mysize = $_SESSION['size'];
$myprice = $_SESSION['amount'];
$search = $_SESSION['search'];
$myqty = $_SESSION['quantity'];

$submit = $_POST['submit3'];
if ($submit == "Print Receipt")
{  // text1
//$discount = $_POST['discount'];
$c_name = $_POST['c_name'];
$amt_pd = $_POST['amt_pd'];

//$_SESSION['discount'] = $discount;
$_SESSION['c_name'] = $c_name;
$_SESSION['amt_pd'] = $amt_pd;
header('location:receipt.php');

}
/*$submit = $_POST['submit3'];
if ($submit == "Print Receipt")
{  // text1
$c_name = $_POST['c_name'];
if($c_name != "") {
$_SESSION['c_name'] = $c_name;
 
header('location:receipt.php');
}
}
*/
?>
