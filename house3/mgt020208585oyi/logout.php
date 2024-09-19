<?php
if(!isset($_session))
session_start();
SESSION_destroy();
if ($_GET['link'] == "index")
header('LOCATION: '.' ../index.php');

?>