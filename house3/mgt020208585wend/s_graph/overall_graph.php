<?php
//dbase connection=======================================
include('../conx.php');
//========================================================è
if(!isset($_session)){
session_start();
}

if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$mysection = $_SESSION['schl_session'];
$myterm = $_SESSION['term'];
require('../library.php');
require('../database.php');

$sql3 = "SELECT DISTINCT(class)
		FROM class_reg order by class_id ASC";
		$result1 = mysql_query($sql3) or die(mysql_error());
$sql6 = "SELECT DISTINCT(schl_session)
		FROM sch_session order by session_id desc";
		$result3 = mysql_query($sql6) or die(mysql_error());
$sql7 = "SELECT DISTINCT(term)
		FROM term";
		$result4 = mysql_query($sql7) or die(mysql_error());
$sql5 = "SELECT DISTINCT(subject)
		FROM subject_reg order by subject ASC";
		$result2 = mysql_query($sql5) or die(mysql_error());

/*$submit = $_POST['Submit'];
if ($submit == "OK")
{  // text1
		$admission = $_POST['admin_no'];
		$subject = $_POST['subject'];
		$class = $_POST['class'];
		$section = $_POST['section'];

$_SESSION['admin_no'] = $myadmin;
$_SESSION['subject'] = $mysubject;
$_SESSION['class'] = $myclass;
$_SESSION['section'] = $mysection;

	header ('location: graphical.php');

}*/
?>

<html>
<head>

<title>Overall Graphical Analysis</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
}
-->
</style>
<link href="../css/mystyle.css" rel="stylesheet" type="text/css">

<link href="../css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search1.php",
		minLength: 1
	});				

});
</script>

</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><?php
include("header.php");
?></td>
  </tr>
  <tr>
    <td bgcolor="#F1E2A9"><span class="header"> <a href="../term_select_report.php">Back </a>|</span></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0">
      <tr>
        <td width="59%" align="center"><form name="form1" method="post" action="graphical.php">
          <table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td bgcolor="#F1E2A9"><table width="350" border="0" align="center" cellpadding="1" cellspacing="1">
                <tr>
                  <td colspan="2" align="center" bgcolor="#FFFFFF"><span class="headtext13">PERFORMANCE ANALYSIS REPRESENTATION</span></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td width="171" align="right" bgcolor="#FFFFFF">Admission Number:</td>
                  <td width="165" align="left" bgcolor="#FFFFFF"><label for="admission"></label>
                    <input type="text" name="admission" id="admission" class="auto"></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF">Subject:</td>
                  <td bgcolor="#FFFFFF"><select name="subject" id="subject">
                    <?php 
			while($data = dbFetchAssoc($result2)){
			?>
                    <option value="<?php echo $data['subject']; ?>"><?php echo $data['subject']; ?></option>
                    <?php 
			}//while
			?>
                  </select></td>
                </tr>
                <tr>
                  <td colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" id="Submit" value="OK"></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </form></td>
        </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
