<?
include ('../../uconx.php');

if(!isset($_session))
session_start();

$batch = $_SESSION['batch'];
$p_name = $_SESSION['p_name'];

//include('values.php');

	header ('location: graphical.html');

?>