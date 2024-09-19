<?
include ('../../uconx.php');

if(!isset($_session))
session_start();

$d_date = $_SESSION['d_date'];

//include('values.php');

	header ('location: graphical.html');

?>