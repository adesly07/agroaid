<?php

include ('../../uconx.php');

if(!isset($_session))
session_start();

$batch = $_SESSION['batch'];
$p_name = $_SESSION['p_name'];

 $sql4 = mysql_query("select * from f_mgt where batch = '$batch' and p_name = '$p_name'");
while($row = mysql_fetch_array($sql4)) {
echo $row['p_name'] . " " . $row['batch'] . "/" . $row['mortality']. "/" ;
}

?>