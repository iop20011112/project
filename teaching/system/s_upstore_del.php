<?php require_once('../Connections/easyshop.php'); ?>
<?php
session_start();
if($_SESSION['MM_Username']<>"admin"){
echo "<a href=sys_login.php>login</a>";
exit;
}
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rs = 100;
$pageNum_rs = 0;
if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

mysql_select_db($database_easyshop, $easyshop);
if($_GET['so']<>""){
$query_rs = "SELECT * FROM s_product a left join i_item b on a.s_item1 =b.i_id  left join i2_item c on a.s_item2 =c.i2_id  where a.s_item1 ='". $_GET['so'] ."' ORDER BY i_text desc";
}else{
$query_rs = "SELECT * FROM s_product a left join i_item b on a.s_item1 =b.i_id  left join i2_item c on a.s_item2 =c.i2_id  ORDER BY i_text desc";

}


$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $startRow_rs, $maxRows_rs);
$rs = mysql_query($query_limit_rs, $easyshop) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if (isset($_GET['totalRows_rs'])) {
  $totalRows_rs = $_GET['totalRows_rs'];
} else {
  $all_rs = mysql_query($query_rs);
  $totalRows_rs = mysql_num_rows($all_rs);
}
$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;

mysql_select_db($database_easyshop, $easyshop);
$query_rs2 = "SELECT * FROM i_item ORDER BY i_text ASC";
$rs2 = mysql_query($query_rs2, $easyshop) or die(mysql_error());
$row_rs2 = mysql_fetch_assoc($rs2);
$totalRows_rs2 = mysql_num_rows($rs2);

$queryString_rs = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs") == false && 
        stristr($param, "totalRows_rs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs = sprintf("&totalRows_rs=%d%s", $totalRows_rs, $queryString_rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
body {
	background-image: url(../jpg/ERH.jpg);
}
.style8 {color: #FFFFFF}
.style14 {font-size: large; color: #FFFFFF; }
.style17 {font-size: large; }
-->
</style>
</head>

<body>
<div align="center">
  <table width="28%" border="0">
    <tr>
      <td bgcolor="#8FB8D8"><div align="center" class="style8">物料管理</div></td>
    </tr>
  </table>
</div>
<div align="center">
  <?php require_once('system_top.php'); ?>
<br>
</div>
<?php require_once('../Connections/easyshop.php'); ?>
<?php
session_start();
if($_SESSION['MM_Username']<>"admin"){
echo "<a href=sys_login.php>login</a>";
exit;
}
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rs = 100;
$pageNum_rs = 0;
if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

mysql_select_db($database_easyshop, $easyshop);
if($_GET['so']<>""){
$query_rs = "SELECT * FROM s_product a left join i_item b on a.s_item1 =b.i_id  left join i2_item c on a.s_item2 =c.i2_id  where a.s_item1 ='". $_GET['so'] ."' ORDER BY i_text desc";
}else{
$query_rs = "SELECT * FROM s_product a left join i_item b on a.s_item1 =b.i_id  left join i2_item c on a.s_item2 =c.i2_id  ORDER BY i_text desc";

}


$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $startRow_rs, $maxRows_rs);
$rs = mysql_query($query_limit_rs, $easyshop) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if (isset($_GET['totalRows_rs'])) {
  $totalRows_rs = $_GET['totalRows_rs'];
} else {
  $all_rs = mysql_query($query_rs);
  $totalRows_rs = mysql_num_rows($all_rs);
}
$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;

mysql_select_db($database_easyshop, $easyshop);
$query_rs2 = "SELECT * FROM i_item ORDER BY i_text ASC";
$rs2 = mysql_query($query_rs2, $easyshop) or die(mysql_error());
$row_rs2 = mysql_fetch_assoc($rs2);
$totalRows_rs2 = mysql_num_rows($rs2);

$queryString_rs = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rs") == false && 
        stristr($param, "totalRows_rs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rs = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rs = sprintf("&totalRows_rs=%d%s", $totalRows_rs, $queryString_rs);
?>
<div align="center"><br>
  <?php // echo ($startRow_rs + 1) ?>
  <?php  //echo min($startRow_rs + $maxRows_rs, $totalRows_rs) ?> 
HAVE <?php echo $totalRows_rs ?><br>
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center"><?php if ($pageNum_rs > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, 0, $queryString_rs); ?>">first</a>
        <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center"><?php if ($pageNum_rs > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, max(0, $pageNum_rs - 1), $queryString_rs); ?>">up</a>
        <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, min($totalPages_rs, $pageNum_rs + 1), $queryString_rs); ?>">down</a>
        <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center"><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, $totalPages_rs, $queryString_rs); ?>">old page</a>
        <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  <p><a href="s_upstore.php"></a></p>
</div>
</body>
</html>
<?php
mysql_free_result($rs);

mysql_free_result($rs2);
?>

<script language="javascript">
function accessSina()
{
 if (confirm('確定要刪除?')) {
  return true;
 } else {
  return false;

  }
}
</script>
