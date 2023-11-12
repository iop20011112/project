<?php require_once('../Connections/easyshop.php'); ?>
<?php
// *** Validate request to login to this site.
session_start();

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($accesscheck)) {
  $GLOBALS['PrevUrl'] = $accesscheck;
  session_register('PrevUrl');
}

if (isset($_POST['account'])) {
  $loginUsername=$_POST['account'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "system.php";
  $MM_redirectLoginFailed = "sys_login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_easyshop, $easyshop);
  
  $LoginRS__query=sprintf("SELECT sys_account, sys_pass FROM system_account WHERE sys_account='%s' AND sys_pass='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $easyshop) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $GLOBALS['MM_Username'] = $loginUsername;
    $GLOBALS['MM_UserGroup'] = $loginStrGroup;	      

    //register the session variables
    session_register("MM_Username");
    session_register("MM_UserGroup");

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	$_SESSION['MM_Username']="admin";
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>系統管理登入</title>
<style type="text/css">
<!--
body {
	background-image: url();
	background-color: #FFFFFF;
}
.style1 {color: #FFFFFF}
.style3 {color: #333333}
.style4 {color: #000000; }
-->
</style></head>

<body>
<div align="center">
  <p class="style3">管理者登入</p>
</div>
<div align="center" class="style1"> <img src="../images/RWD.jpg" width="810" height="438"></div>
<hr>
<form action="<?php echo $loginFormAction; ?>" method="POST" name="form1" target="_top">
  <div align="center">
    <table width="383" border="1">
      <tr>
        <td width="76" bgcolor="#EFEFEF"><div align="left" class="style4">帳號</div></td>
        <td width="291" bgcolor="#EFEFEF"><div align="left" class="style4">
          <input name="account" type="text" id="account">
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#EFEFEF"><div align="left" class="style4">密碼</div></td>
        <td bgcolor="#EFEFEF"><div align="left" class="style4">
          <input name="pass" type="password" id="pass">
        </div></td>
      </tr>
    </table>  
    <p>
      <input type="submit" name="Submit" value="送出">
    </p>
    <p><a href="../index.php">回首頁  </a></p>
  </div>
</form>
<div align="center"><br>
</div>
<p>&nbsp;</p>
</body>
</html>
