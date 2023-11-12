<?php require_once('../Connections/cka_table_db.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "sys_login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO qa (type,n_title, n_text, n_news) VALUES (%s,%s, %s, %s)",
   GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['aa'], "text"),
                       GetSQLValueString($_POST['bb'], "text"),
                       GetSQLValueString($_POST['tt'], "date"));

mysql_select_db($database_cka_table_db, $cka_table_db);
  $Result1 = mysql_query($insertSQL, $cka_table_db) or die(mysql_error());

  $insertGoTo = "sys_qa.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_rs = 20;
$pageNum_rs = 0;
if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

mysql_select_db($database_cka_table_db, $cka_table_db);
$query_rs = "SELECT * FROM qa ORDER BY type DESC";
$query_limit_rs = sprintf("%s LIMIT %d, %d", $query_rs, $startRow_rs, $maxRows_rs);
$rs = mysql_query($query_limit_rs, $cka_table_db) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);

if (isset($_GET['totalRows_rs'])) {
  $totalRows_rs = $_GET['totalRows_rs'];
} else {
  $all_rs = mysql_query($query_rs);
  $totalRows_rs = mysql_num_rows($all_rs);
}
$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;

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
<title>新聞管理 </title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style2 {
	color: #406196;
	font-weight: bold;
}
.style3 {color: #CC0033}
.style10 {color: #669933; font-weight: bold; }
.style17 {color: #000000; font-weight: bold; font-size: large; }
.style23 {color: #406196}
.style24 {color: #FFFFFF}
.style29 {color: #FFFFFF; font-size: x-large; }
.style30 {font-size: x-large}
.style34 {color: #FFFFFF; font-weight: bold; font-size: large; }
.style35 {font-size: large; color: #FFFFFF; }
.style36 {font-size: large}
.style37 {font-size: large; color: #000000; }
-->
</style></head>

<body>
<div align="center"><img src="../images/images (1).jpg" width="367" height="137" /></div>
<div align="center"><span class="style2">[常見問題管理
</span><span class="style23">
  ]
  </span>
<br />
<hr />
  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="571" border="0">
      <tr>
        <td bgcolor="#83B346"><span class="style29">帳號</span></td>
        <td bgcolor="#FFFFFF"><span class="style30">
          <input name="ADMIN" type="hidden" id="ADMIN" value="admin" />
        ADMIN</span></td>
      </tr>
      <tr>
        <td bgcolor="#83B346"><span class="style29">類型</span></td>
        <td bgcolor="#FFFFFF"><span class="style30">
          <label>
          <select name="type" id="type">
            <option value="HTML" selected="selected">HTML</option>
            <option value="CSS">CSS</option>
            <option value="JavaScript">JavaScript</option>
          </select>
          </label>
        </span></td>
      </tr>
      <tr>
        <td width="63" bgcolor="#83B346"><div align="left" class="style29"><span class="style24">問題</span></div></td>
        <td width="498" bgcolor="#FFFFFF"><div align="left" class="style30">
          <input name="aa" type="text" id="aa" size="50" />
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#83B346"><div align="left" class="style29"><span class="style24">答案</span></div></td>
        <td bgcolor="#FFFFCC"><div align="left" class="style30"><span class="style3">
          <textarea name="bb" cols="50" rows="3" wrap="virtual" id="bb"></textarea>
        </span></div></td>
      </tr>
    </table>
    <input type="submit" name="Submit" value="新增" />
    <input name="tt" type="hidden" id="tt" value="<?php echo date("Y-m-d")?>" />
    <input type="hidden" name="MM_insert" value="form1">
  </form>
</div>
<table width="1258" border="0" align="center">
      <tr>
        <td width="120" bgcolor="#336666">&nbsp;</td>
        <td width="128" bgcolor="#336666"><span class="style35">類型</span></td>
        <td width="376" bgcolor="#336666"><span class="style34">標題</span></td>
        <td width="553" bgcolor="#336666" class="style10"><span class="style34">內容</span></td>
      </tr>
      <?php do { ?><tr>
        <td bgcolor="#FFFFFF"><div align="center"><span class="style17"><a href="sys_qa_edit.php?id=<?php echo $row_rs['n_id']; ?>"></a><a href="sys_qa_del.php?id=<?php echo $row_rs['n_id']; ?>">刪除</a></span></div></td>
        <td bgcolor="#FFFFFF"><span class="style36"><span class="style37"><?php echo $row_rs['type']; ?></span></span></td>
        <td bgcolor="#FFFFFF"><span class="style37"><?php echo $row_rs['n_title']; ?></span></td>
        <td bgcolor="#FFFFFF"><span class="style37"><?php echo $row_rs['n_text']; ?></span></td>
        </tr>
      <?php } while ($row_rs = mysql_fetch_assoc($rs)); ?>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_rs > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, 0, $queryString_rs); ?>">First</a>
        <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_rs > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, max(0, $pageNum_rs - 1), $queryString_rs); ?>">Previous</a>
        <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, min($totalPages_rs, $pageNum_rs + 1), $queryString_rs); ?>">Next</a>
        <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, $totalPages_rs, $queryString_rs); ?>">Last</a>
        <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<div align="center"><a href="index.php">回上頁</a>
</div>
</body>
</html>
<?php
mysql_free_result($rs);
?>
