<?php require_once('Connections/conn.php'); ?>
<?php
$colname_jj = "-1";
if (isset($_GET['id'])) {
  $colname_jj = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_conn, $conn);
$query_jj = sprintf("SELECT * FROM qa WHERE n_id = %s", $colname_jj);
$jj = mysql_query($query_jj, $conn) or die(mysql_error());
$row_jj = mysql_fetch_assoc($jj);
$totalRows_jj = mysql_num_rows($jj);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php echo $row_jj['n_title']; ?>
<?php echo $row_jj['n_text']; ?>
</body>
</html>
<?php
mysql_free_result($jj);
?>
