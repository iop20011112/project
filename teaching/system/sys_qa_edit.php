<?php require_once('../Connections/cka_table_db.php'); ?>
<?php
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
  $updateSQL = sprintf("UPDATE qa SET n_title=%s, n_text=%s WHERE n_id=%s",
                       GetSQLValueString($_POST['aa'], "text"),
                       GetSQLValueString($_POST['bb'], "text"),
                       GetSQLValueString($_POST['hiddenField'], "int"));

mysql_select_db($database_cka_table_db, $cka_table_db);
  $Result1 = mysql_query($updateSQL, $cka_table_db) or die(mysql_error());

  $updateGoTo = "sys_qa.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_cka_table_db, $cka_table_db);
$query_Recordset1 = sprintf("SELECT * FROM qa WHERE n_id = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $cka_table_db) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>[新聞管理修改] </title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style4 {color: #3F5F92}
.style5 {color: #4568A0}
-->
</style>
</head>

<body>
<div align="center"><img src="../jpg/1.jpg" width="807" height="307" /></div>
<div align="center">
  <p class="style4">[常見問題修改]  </p>
  <p>  <a href="sys_qa.php">回上頁</a>  </p>
  <hr />
  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
<table width="578" border="0">
  <tr>
    <td width="17" bgcolor="#FFFFFF"><div align="left" class="style5">Q</div></td>
    <td width="551" bgcolor="#FFFFFF"><div align="left" class="style5">
      <input name="aa" type="text" id="aa" value="<?php echo $row_Recordset1['n_title']; ?>" size="50" />
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="left" class="style5">A</div></td>
    <td bgcolor="#FFFFFF"><div align="left" class="style5">
      <textarea name="bb" cols="50" rows="3" wrap="virtual" id="bb"><?php echo $row_Recordset1['n_text']; ?></textarea>
    </div></td>
  </tr>
</table>
<input name="hiddenField" type="hidden" value="<?php echo $row_Recordset1['n_id']; ?>" />
  <input type="submit" name="Submit" value="修改" />
  <input type="hidden" name="MM_update" value="form1">
</form>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
