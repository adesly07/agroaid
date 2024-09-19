<?
//dbase connection=======================================
include('../conx.php');
//========================================================è
if(!isset($_session)){
session_start();
}
$myadmission = $_SESSION['admission'];
$myclass = $_SESSION['class'];
$mysection = $_SESSION['section'];

$sql1 = mysql_query("select * from reg where admin_no = '$myadmission'");
while ($row = mysql_fetch_array($sql1)) {
			//$admin = $row ['admin_no'];
			$surname = $row ['surname'];
			$firstname = $row ['firstname'];
			$lastname = $row ['lastname'];
			$name = ("$surname" . " $firstname" . " $lastname");
			$imgname2 = $row ['imgname'];

$img_file = "../../photos/".$imgname2;

$nameimg= "<img src='$img_file'".'border="0">';
}
$sql7 = mysql_query("select * from school_info");
while ($row = mysql_fetch_array($sql7)) {
$sch_name = $row['sch_name'];
$sch_address = $row['sch_address'];
$sch_phone = $row['sch_phone'];
$sch_email = $row['sch_email'];
$sch_web = $row['sch_web'];

}
 $rpp;        //Records Per Page 
     $cps;        //Current Page Starting row number 
     $lps;        //Last Page Starting row number 
     $a;        //will be used to print the starting row number that is shown in the page 
     $b;         //will be used to print the ending row number that is shown in the page 
    
 
   if(empty($_GET["cps"])) 
    { 
        $cps = "0"; 
    } 
    else 
    { 
        $cps = $_GET["cps"]; 
    } 
  //////////////////////////////////////////////////////////////////////////////// 

    $a = $cps+1; 

    $rpp = "1"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='broadsheet.php?cps=$lps'>Previous</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'>Previous</font>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from school_info ORDER BY 'id' DESC limit $cps, $rpp"; 
    $rs=mysql_query($q) or die(mysql_error()); 
    $nr = mysql_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysql_query($q0) or die(mysql_error()); 
    $row0=mysql_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
	$_SESSION['id'] = $row0['id'];
    ///////////////////////////////////////////////////////////////////////
    if (($nr0 < 1) || ($nr < 1)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
    } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="757" border="0" align="center">
      <? 
    while ($row=mysql_fetch_array($rs)) 
    { 
	$cps = $cps +1; 

    $sch_name=$row['sch_name'];
	$sch_address=$row['sch_address'];
	$sch_phone=$row['sch_phone'];
	$sch_email=$row['sch_email'];
	$sch_web=$row['sch_web'];
	/////////////////////////////
$imgname = $row['imgname'];
$out_w = $row['width'];
$out_h = $row['height'];
$img_file = "logo/".$imgname;
$imgname = "<img src='$img_file'".' width="'.$out_w.'" height="'.$out_h.'" border="0">';
/////////////////////////////
	?>
      <tr>
        <td width="15%"><?=$imgname?></td>
        <td width="63%" valign="top"><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><font size="4"><strong><? echo $sch_name ?></strong></font></td>
          </tr>
          <tr>
            <td align="center"><font size="2"><? echo $sch_address ?></font></td>
          </tr>
          <tr>
            <td align="center"><font size="2"><? echo $sch_phone ?></font></td>
          </tr>
          <tr>
            <td align="center"><font size="2"><? echo $sch_email ?></font></td>
          </tr>
          <tr>
            <td align="center"><font size="2"><? echo $sch_web ?></font></td>
          </tr>
         
          <? } ?>
        </table></td>
        <td width="22%" valign="top"><table width="100%" border="0">
          <tr>
            <td><? echo $nameimg; ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#E8E8E8"><table width="600" border="0" align="center" cellpadding="0" cellspacing="2">
          <tr>
            <td width="13%" height="21" align="left" bgcolor="#FFFFFF" class="name">Name:</td>
            <td width="41%" align="left" bgcolor="#FFFFFF" class="headtext13"><? echo strtoupper($name); ?></td>
            <td width="31%" align="left" bgcolor="#FFFFFF" class="name">Admission No:</td>
            <td width="15%" align="left" bgcolor="#FFFFFF" class="headtext13"><font size="2"><? echo $myadmission; ?></font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>