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
$ip = getenv("REMOTE_ADDR");
$r_no = $_SESSION['r_no'];
$p_name = $_SESSION['p_name'];
$batch = $_SESSION['batch'];
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
while ($row = mysql_fetch_array($sql)) {
$name = $row['name'];	
}
///////////
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

$submit = $_POST['submit2'];
if ($submit == "Add to Cart")
{  // text1
$qty = $_POST['qty'];
$discount = $_POST['discount'];
if ($discount == "") {
$amount = ($myprice * $qty);
$sql1 = mysql_query("insert into sales set batch = '$batch', p_name = '$p_name', r_no = '$r_no', s_item = '$mys_item', item = '$myitem', size = '$mysize', quantity = '$qty', rate = '$myprice', amount = '$amount', discount = '$discount', day = '$day', month = '$month', year = '$year', s_by = '$name', s_date = '$s_date',  s_time = CURTIME(), ip = '$ip', p_status = 'PAID'");
if($sql1) {
$_SESSION['qty'] = $qty;
header('location:sales.php');	
}
} else {
$price =  ($myprice - $discount);
$amount = ($price * $qty);
$sql1 = mysql_query("insert into sales set batch = '$batch', p_name = '$p_name', r_no = '$r_no', s_item = '$mys_item', item = '$myitem', size = '$mysize', quantity = '$qty', rate = '$price', amount = '$amount', discount = '$discount', day = '$day', month = '$month', year = '$year', s_by = '$name', s_date = '$s_date',  s_time = CURTIME(), ip = '$ip', p_status = 'PAID'");
if($sql1) {
$_SESSION['qty'] = $qty;
header('location:sales.php');	
}
}
}


$sn = $_REQUEST['id'];
$sql3= mysql_query("delete from sales where id ='$sn'");

if($sql3){
header('location:sales.php');	
}

?>
