<?php echo $username; ?>
<p><?php echo $password; ?></p>
<p><?php echo $msg; ?></p>
<?php
//dbase connection=======================================
include('uconx.php');
//========================================================
//if(!isset($_session)){
//session_start();
//}
$msg = "";
$submit = isset($_POST['Logme']);

if ($submit == "LOGIN")
{  // text1
		$username = $_POST['username'];
		$password = $_POST['password'];



strlen($username <=20);
if (strlen ($username) > 20){ $error= "Username Exceed The Maximun Character.";}else{

		$sql = mysql_query("select * From users Where username = '$username' And password = '$password'");
		while ($row = mysql_fetch_array($sql)){
		
		$section = $row['section'];	
		}
if ($section == 'Administrator'){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: umgt");
} 
elseif ($section == 'Registry'){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: Cashier");
} 
	
if (!mysql_num_rows($sql))
{
$msg = " <div>
     <strong>Oops! </strong> Invalid Username or Password </div>";	
}
} } 
?>