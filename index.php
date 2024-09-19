<?php
//dbase connection======================================
include('uconx.php');
//==============================================
if(!isset($_session)){
session_start();
}
$msg = "";
$submit = isset($_POST['Logme']);

if ($submit =='Login')
{  // text1
		$username = $_POST['username'];
		$password = $_POST['password'];
$d_date = date('d/m/Y');
strlen($username <=20);
if (strlen ($username) > 20){ $error= "Username Exceed The Maximun Character.";}else{

		$sql = mysql_query("select * From create_login Where username = '$username' And password = '$password'");
		while ($row = mysql_fetch_array($sql)){
		
		$section = $row['section'];	
		}
		//Super Admin
if ($section == 'Director'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585sly");
} 
elseif ($section == 'Consultant'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585my");
} 
elseif ($section == 'Monitoring'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585wend");
} 

	elseif ($section == 'Farm Manager'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585seu");
} 
	elseif ($section == 'Farm Supervisor'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585yem");
} 
	elseif ($section == 'Cashier'){
$_SESSION['d_date'] = $d_date;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: mgt020208585oyi");
} 

if (!mysql_num_rows($sql))
{
$msg = " <div>
     <strong>Oops!  Invalid Username or Password </strong></div>";	
}
} } 
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>ERP System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="header">
            <div class="container">
                <div class="row">
              <div class="logo span4">
                        <h2><a href="">POULTRY ERP <span class="red">SYSTEM</span></a></h2>
                    </div>
                    <div align="right">
                    <a href="house2" rel="tooltip">Poultry House 2 </a>| <a href="house3">Poultry House 3</a></div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <div class="iphone span5">
                    <img src="assets/img/lock.png" alt="">
                </div>
                <div class="register span6">
                    <form action="index.php" method="post">
                      <h2><span class="red"><strong>Login</strong></span> </h2>
                       <span class="error"><?php echo $msg; ?></span>
                       <label for="username">Username</label>
                      <input type="text" id="username" name="username" placeholder="Enter your username" autofocus>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                      
                        <button name="Logme"  type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

