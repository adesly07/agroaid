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
$d_no = $_SESSION['d_no'];
$sql = mysql_query("select * from create_login where username = '$username' and password = '$password'");
while ($row = mysql_fetch_array($sql)) {
$name = $row['name'];	
}
///////////
	 $b_sql = mysql_query("select * from u_batch");
    while ($row=mysql_fetch_array($b_sql)) 
    { 
	$batch = $row['batch'];
	}


$mycat = $_SESSION['category'];
$mytype = $_SESSION['type'];
$myqty = $_SESSION['quantity'];
$search = $_SESSION['search'];
$myprice = $_SESSION['u_price'];

$submit = $_POST['submit2'];
if ($submit == "Dispense")
{  // text1
$qty = $_POST['qty'];
$r_name = $_POST['r_name'];
$sql1 = mysql_query("insert into dispense set batch = '$batch', d_no = '$d_no', type = '$mytype', quantity = '$qty', r_name = '$r_name', day = '$day', month = '$month', year = '$year', s_by = '$name', s_date = '$s_date',  s_time = CURTIME(), ip = '$ip', p_status = 'DISPENSED'");
if($sql1) {
$_SESSION['qty'] = $qty;
header('location:dispenser.php');	
}

}


$sn = $_REQUEST['id'];
$sql3= mysql_query("delete from dispense where id ='$sn'");

if($sql3){
header('location:dispenser.php');	
}

?>
