<?php require_once('../Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_rs = "update qa set n_text='' where n_id='".$_GET['id']."'";
$rs = mysql_query($query_rs, $conn) or die(mysql_error());
 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>清除完畢</p>
  <p><a href="sys_qa_all.php">回上頁</a></p>
</div>
</body>
</html>
 
 
 <script language=javascript> setTimeout("location.href='sys_qa_all.php'",0); </script>