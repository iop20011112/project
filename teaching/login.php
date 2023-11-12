<?php require_once('Connections/easyshop.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['acc'])) {
  $loginUsername=$_POST['acc'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "item.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_easyshop, $easyshop);
  
  $LoginRS__query=sprintf("SELECT a_account, a_pass FROM a_account WHERE a_account='%s' AND a_pass='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $easyshop) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>菜逼逼學前端</title>
<style type="text/css">
<!--
body {
	background-color: #DCE6E3;
}
-->




ul{
  list-style: none;
}
ul li::before{
/*   可以自訂其他形狀 */
  content: "\2022";
/*   顏色 */
  color: #FFFFFF;
  font-weight: bold;
/*   設定 display */
  display: inline-block;
/*  寬度  */
  width: 1rem;
/*  可以視情況調整形狀的距離  */
  margin-left: -2rem;
}








/* 漸變、陰影、圓角 */
.btn {
  color: red;
  border: 1px solid red;
}
.btn-bottom {
  color: red;
  border: none;
  border-bottom: 1px solid red;
}
.btn-dashed {
  color: #49734D;
  border: 1px dashed #49734D;
}
.btn-radius {
  color: #49734D;
  border: 1px solid #49734D;
  height: 32px;
  border-radius: 16px;
}

.btn-circle {
  color: #49734D;
  border: 1px solid #49734D;
  width: 80px;
  height: 80px;
  border-radius: 2px 40px 2px 40px;
/*   transition: height 0.1s, width 0.5s; */
  transition: all 0.3s;
}

.btn-circle:hover {
  background-image: linear-gradient(90deg, #FA748B 0%, #f5a623 100%);
  color: #fff;
  box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3);
/*   width: 100px;
  height: 100px; */
  transform: scale(1.5);
}

.btn-shadow {
  width: 80px;
  height: 60px;
  border: none;
  box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;
}

.btn-rotate:hover {
/*    transform: rotate(45deg); */
/*    transform: translate(50px, 50px); */
}

.remove-btn {
  border: none;
  font-weight: bold;
  font-size: 48px;
  transition: transform 0.5s;
}

.style3 {
	color: #49734D;
	font-size: xx-large;
	font-weight: bold;
}
.style4 {font-size: 50px}


 
#BoxText2 {
border:2px gray dashed;
padding:8px;
width:800px;
background-color:#fafafa;
}


.button {
    background-color: #407638; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {border-radius: 2px;}
.button2 {border-radius: 4px;}
.button3 {border-radius: 8px;}
.button4 {border-radius: 20px;}
.button5 {border-radius: 50%;}









 

table tr{
  border-bottom: solid 2px white;
}

table tr:last-child{
  border-bottom: none;
}

table th{
  position: relative;
  width: 30%;
  background-color: #7d7d7d;
  color: white;
  text-align: center;
  padding: 10px 0;
}

table th:after{
  display: block;
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  top:calc(50% - 10px);
  right:-10px;
  border-left: 10px solid #7d7d7d;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}

table td{
  text-align: left;
  width: 70%;
  text-align: center;
  background-color: #eee;
  padding: 10px 0;
}

.main {
  margin: 20px auto;
  item-align: center;
  width: 80%;
}


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /* 主体部分 */


/* 整体介绍模块 */

.main-intro {
    height: 500px;
}

.main-intro h2 {
    margin: 0 10px 0 0;
    font-size: 34px;
}

.main-intro p {
    margin: 15px auto;
    line-height: 24px;
}

.main-intro img {
    float: right;
    width: 268px;
    height: 432px;
    padding: 30px 0;
    margin-left: 50px;
    border: 1px solid #eeeeee;
}

.main-intro video {
    width: 800px;
    height: 206px;
}

.main-intro a {
    display: inline-block;
    margin-bottom: 10px;
    padding: 6px 20px;
    background-color: #df372c;
    border-radius: 6px;
}


/* 人物关系部分 */

.main-part {
    overflow: hidden;
}

.main-part li {
    height: 120px;
    margin-bottom: 60px;
    border-top: 1px solid #eeeeee;
}

.main-part img {
    float: left;
    width: 150px;
    height: 150px;
    margin-right: 36px;
    margin-top: 15px;
    border-radius: 75px;
    border: 1px solid #eeeeee;
}

.main-part h4 {
    margin-top: 15px;
    margin-bottom: 10px;
    color: #df372c;
}
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 input[type=text] {
  width: 50%;
  padding: 14px 22px;
  margin: 10px 0;
  box-sizing: border-box;
  border: 1px solid #6E9170;
  outline: none;
}

input[type=text]:focus {
  background-color: lightblue;
}
 
 
 
 
  input[type=password] {
  width: 50%;
  padding: 14px 22px;
  margin: 10px 0;
  box-sizing: border-box;
  border: 1px solid #6E9170;
  outline: none;
}

input[type=password]:focus {
  background-color: lightblue;
}
 
 
 
 
 
 
 
 
 input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
 
.style22 {color: #6E9170}
</style>
 

</head>

<body>
<?php
if($_GET['login']=="x"){
$_SESSION['MM_Username']="";
}
?>
<table width="200" border="1" align="center" bordercolor="#FFFFFF">
  <tr>
    <td><table width="1200" height="1262" border="0">
      <tr>
        <td colspan="5" background="images/BBG.jpg" bgcolor="#6E9170">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" background="images/2.jpg" bgcolor="#DCE6E3"><img src="images/logo.png" width="161" height="120" /></td>
      </tr>
      <tr>
        <td height="274" colspan="5"><div align="center"><a href="index.html"><img src="images/bg.png" width="100%" height="289" border="0" /></a></div></td>
      </tr>
      <tr>
        <td width="235" height="1000" valign="top" bgcolor="#30877E"><iframe src="left.html" width="100%" height="1200" frameborder="0"> 您的瀏覽器不支援iframe，請升級 </iframe></td>
        <td width="955" colspan="4" valign="top"><p align="center"> <a href="#t">
            <button class="btn-dashed style3 style4">登入會員</button>
          </a>
               
        </p>
            <hr />
			
 
 
 
 
  
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <label for="fname">會員帳號</label>
  <input type="text" id="acc" name="acc" value="">
  
  <br />
  <label for="lname">會員密碼</label>
  <input type="password" id="pass" name="pass" value="">
  <br>
 
 
<input type="submit" value="登入">
</form>
  
  <section class="main">
        <div class="main-intro">
          <h2 id="h0">&nbsp;</h2>
            </div>
        <div class="main-part">
            <h3 id="h1">&nbsp;</h3>
            <ul><li>
              <h4 id="h3">&nbsp;</h4>
                    </li>
            </ul>
        </div>
    </section>
 
            <br />          		  		  
            <p align="center"> </p>
          <div id="BoxText2">
            
         
            </div>
          <hr />
        
		
		</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
