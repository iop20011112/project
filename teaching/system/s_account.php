<?php require_once('../Connections/easyshop.php'); ?>
<?php
session_start();
if($_SESSION['MM_Username']<>"admin"){
echo "<a href=sys_login.php>login</a>";
exit;
}
mysql_select_db($database_easyshop, $easyshop);
$query_rs = "SELECT * FROM a_account ORDER BY a_account ASC";
$rs = mysql_query($query_rs, $easyshop) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>會員管理</title>
<style type="text/css">
<!--
.style1 {font-size: small}
body {
	background-image: url(../jpg/7%20(2).jpg);
	background-image: url(../jpg/6285420043_96d5feecee_b.jpg);
}
.style3 {color: #FFFFFF; font-family: "標楷體"; }
.style4 {font-family: "標楷體"}
.style6 {font-size: 12px}
.style7 {color: #666666}
.style9 {color: #666666; font-weight: bold; }
.style11 {color: #666666; font-weight: bold; font-size: medium; }
.style12 {color: #FFFFFF}
.style16 {color: #000066}
-->
</style>
</head>

<body>

<div align="center"><img src="../images/html-tagst.jpg" width="624" height="233"></div>
<div align="center" class="style6"><span class="style11"><span class="style16">會員管理
  </span>
  <?php require_once('system_top.php'); ?>
</span><span class="style11"></span><span class="style9"></span><span class="style7">  </span></span>
  <table width="100%" border="1" align="center">
    <tr bgcolor="#CCCCFF">
      <td width="112" height="20" bgcolor="#3C4A3D"><div align="center" class="style3">帳號</div></td>
      <td width="88" bgcolor="#3C4A3D"><div align="center" class="style3">密碼</div></td>
      <td width="111" bgcolor="#3C4A3D"><div align="center" class="style3">姓名</div></td>
      <td width="187" bgcolor="#3C4A3D"><div align="center" class="style3">住址</div></td>
      <td width="98" bgcolor="#3C4A3D"><div align="center" class="style3">電話</div></td>
      <td width="96" bgcolor="#3C4A3D"><div align="center" class="style3">E-MAIL</div></td>
      <td width="64" bgcolor="#3C4A3D"><div align="center"><span class="style12"></span></div></td>
    </tr>
    <?php do { ?>
      <tr>
        <td bgcolor="#FFFFFF"><div align="center" class="style4"><?php echo $row_rs['a_account']; ?></div></td>
        <td bgcolor="#FFFFFF"><div align="center" class="style4"><?php echo $row_rs['a_pass']; ?></div></td>
        <td bgcolor="#FFFFFF"><span class="style4"><?php echo $row_rs['a_name']; ?></span></td>
        <td bgcolor="#FFFFFF"><span class="style4"><?php echo $row_rs['a_address']; ?></span></td>
        <td bgcolor="#FFFFFF"><span class="style4"><?php echo $row_rs['a_phone']; ?></span></td>
        <td bgcolor="#FFFFFF"><span class="style4"><?php echo $row_rs['a_smail']; ?></span></td>
        <td bgcolor="#FFFFFF"><span class="style4"><a href="s_edit_account.php?id=<?php echo $row_rs['a_id']; ?>">修改</a><br>
        <a href="s_account_del.php?id=<?php echo $row_rs['a_id']; ?>">刪除</a> </span></td>
      </tr>
      <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
</table>
</div>
<p align="center" class="style1">
</body>
</html>
<?php
mysql_free_result($rs);
?>