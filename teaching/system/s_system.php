<?php require_once('../Connections/easyshop.php'); ?>
<?php
session_start();
if($_SESSION['MM_Username']<>"admin"){
exit;
}
mysql_select_db($database_easyshop, $easyshop);
$query_rs = "SELECT * FROM sale_product ORDER BY s_id DESC";
$rs = mysql_query($query_rs, $easyshop) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>購買完畢</title>
<style type="text/css">
<!--
.style4 {font-size: small}
.style6 {font-size: small; color: #FFFFFF; font-weight: bold; }
body {
	background-image: url(../GG/li.jpg);
	background-color: #F7F6F2;
}
.style9 {font-size: small; color: #0A0C01; }
.style11 {color: #333333; font-weight: bold; }
.style12 {color: #1FB592}
-->
</style>
</head>

<body>
<div align="center"><img src="../jpg/mrLG1v4LFG_small.png" width="355" height="169"></div>
<div align="center"><span class="style11">[查看購買記錄]</span>
  <span class="style12">
  <?php require_once('system_top.php'); ?>
  </span>
<table width="725" border="1">
  <tr>
    <td width="122" bgcolor="#333333"><div align="center" class="style6">訂單日期</div></td>
    <td width="201" bgcolor="#333333"><div align="center" class="style6">交易編號</div></td>
    <td width="177" bgcolor="#333333"><div align="center" class="style6">處理情況</div></td>
    <td width="101" bgcolor="#333333"><div align="center"><span class="style4"></span></div></td>
  </tr>
  <?php do { ?>
  <tr>
      <td height="37" bgcolor="#FFFFFF"><div align="center" class="style9"><?php echo $row_rs['sale_date']; ?></div></td>
      <td bgcolor="#FFFFFF"><div align="center" class="style9"><?php echo $row_rs['sale_sn']; ?></div></td>
      <td bgcolor="#FFFFFF"><div align="center" class="style9"><?php 
	  switch($row_rs['sale_ps']){
	  case "1":
	  echo "處理中";  
	  break;
	   case "2":
	  echo "運送中";
	  break;
	   case "3":
	  echo "結案";
	  break;
	   case "4":
	  echo "缺貨";
	  break;
	   case "5":
	  echo "退單";
	  break;
	         
	  }
	 
	  
	  ?></div></td>
      <td bgcolor="#FFFFFF"><div align="center" class="style9"><a href="sys_sale_log2.php?id=<?php echo $row_rs['s_id']; ?>">詳細購買資料</a></div></td>
  </tr>
  <?php } while ($row_rs = mysql_fetch_assoc($rs));  ?>
</table>
</div>
</body>
</html>
<?php
mysql_free_result($rs);
?>
