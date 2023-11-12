<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<? include "s_include.php" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>無標題文件</title>
<style type="text/css">
<!--
body {
	background-color: #333333;
	background-image: url(../jpg/1.jpg);
}
.style15 {
	font-size: 16px;
	color: #3F6594;
}
.style16 {font-size: 18px}
.style17 {font-size: 18px; color: #3F6594; }
-->
</style></head>

<body>
 
<form name="form1" method="post" action="">
  <table width="87%" height="206" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
      <tr>
        <td bgcolor="#FFFFFF"> <div align="center"> <img src="../images/erhgbh.JPG" width="271" height="173"></div></td>
      </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div align="left"><a href="s_account.php" target="mainFrame" class="style17">*會員管理</a>
      </div>        <hr align="left"></td>
    </tr>
	
	
	<!--
    <tr>
      <td bgcolor="#FFFFFF"><a href="item.php" target="mainFrame" class="style15">類別管理</a>
      <hr></td>
    </tr>
 -->
    <tr>
      <td bgcolor="#FFFFFF"><div align="left"><a href="sys_qa_all.php" target="mainFrame" class="style17">*留言管理</a>
      </div>        <hr align="left"></td>
    </tr>
	
	 <tr>
      <td bgcolor="#FFFFFF"><div align="left"><a href="ch_syspass.php" target="mainFrame" class="style17">*修改密碼</a>
      </div>        
      <hr align="left"></td>
    </tr>
	
	 <tr>
      <td bgcolor="#FFFFFF"><div align="left"><a href="sys_login.php" target="mainFrame" class="style17">*前往登入</a>
      </div>        <hr align="left"></td>
    </tr>
	
	
    <tr>
      <td bgcolor="#FFFFFF"><div align="left"><a href="<?php echo $logoutAction ?>" target="_top" class="style17">*登出系統</a></div></td>
    </tr>
  </table>
</form>
</body>
</html>
