<?php

include ('../../uconx.php');

if(!isset($_session))
session_start();

$s_date = $_SESSION['s_date'];

 $sql4 = mysql_query("select * from sales where p_status = 'PAID' and s_date = '$s_date'");
while($row = mysql_fetch_array($sql4)) {
echo $row['item'] . " " . "Qty" . $row['quantity'] . " " . "Rate"  . " " . $row['rate'] . "/" . $row['amount']. "/" ;
}

?>