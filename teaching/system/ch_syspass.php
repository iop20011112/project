<?php require_once('../Connections/easyshop.php'); ?>
<?php
session_start();
if($_SESSION['MM_Username']<>"admin"){
exit;
}
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE system_account SET sys_pass=%s WHERE sys_account='admin'",
                       GetSQLValueString($_POST['pass'], "text"));

  mysql_select_db($database_easyshop, $easyshop);
  $Result1 = mysql_query($updateSQL, $easyshop) or die(mysql_error());

  $updateGoTo = "ch_syspass.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rs = "1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rs = (get_magic_quotes_gpc()) ? $_SESSION['MM_Username'] : addslashes($_SESSION['MM_Username']);
}
mysql_select_db($database_easyshop, $easyshop);
$query_rs = sprintf("SELECT * FROM system_account WHERE sys_account = '%s'", $colname_rs);
$rs = mysql_query($query_rs, $easyshop) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>更改密碼</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-family: "標楷體";
	font-size: large;
}
.style3 {font-size: small; font-family: "標楷體"; }
body {
	background-image: url(../img/jghdkj.jpg);
}
.style4 {color: #F2CC7B; font-weight: bold; font-family: "標楷體"; font-size: large; }
.style6 {color: #000000}
.style7 {font-size: small; font-family: "標楷體"; color: #FFFFFF; }
-->
</style>
</head>

<body>
<div align="center">
  <p class="style1">&nbsp; </p>
  <p class="style4 style6">更改密碼  </p>
  <span class="style1">
<?php require_once('system_top.php'); ?>
</span><img src="../images/keyboard-header-min-scaled.jpg" width="635" height="285"></div>
<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center">
    <table width="285" border="1">
      <tr>
        <td bgcolor="#333333"><div align="left" class="style7">帳號</div></td>
        <td><div align="left" class="style3">
        <?php echo $row_rs['sys_account']; ?>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#333333"><div align="left" class="style7">密碼</div></td>
        <td><div align="left" class="style3">
          <input name="pass" type="text" id="pass" value="<?php echo $row_rs['sys_pass']; ?>">
        </div></td>
      </tr>
    </table>  
    <input type="submit" name="Submit" value="送出">
  </div>
  <input type="hidden" name="MM_update" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rs);
?>
