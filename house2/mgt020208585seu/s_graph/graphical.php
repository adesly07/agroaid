<?
include ('../../uconx.php');

if(!isset($_session))
session_start();

$s_date = $_SESSION['s_date'];

//include('values.php');

	header ('location: graphical.html');

?>