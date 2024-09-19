<?php

include ('../../uconx.php');

if(!isset($_session))
session_start();

$d_date = $_SESSION['d_date'];

 $sql4 = mysql_query("select * from v_mgt");
while($row = mysql_fetch_array($sql4)) {
echo $row['p_name'] . " " . $row['batch'] . "/" . $row['quantity']. "/" ;
}

/*$d_date = $_SESSION['d_date'];

 $sql4 = mysql_query("select * from f_mgt where f_date = '$d_date'");
while($row = mysql_fetch_array($sql4)) {
echo $row['p_name'] . " " . $row['batch'] . "/" . $row['f_qty']. "/" ;
}
*/
?>