<?php require_once('Connections/gm.php'); ?>
<?php require_once('Connections/conn.php'); ?>
<?php require_once('Connections/lyudao.php'); ?>
<?php
mysql_select_db($database_gm, $gm);
$query_html = "SELECT * FROM qa WHERE type = 'html' ORDER BY n_title ASC";
$html = mysql_query($query_html, $gm) or die(mysql_error());
$row_html = mysql_fetch_assoc($html);
$totalRows_html = mysql_num_rows($html);

mysql_select_db($database_gm, $gm);
$query_css = "SELECT * FROM qa WHERE type = 'css' ORDER BY n_title ASC";
$css = mysql_query($query_css, $gm) or die(mysql_error());
$row_css = mysql_fetch_assoc($css);
$totalRows_css = mysql_num_rows($css);

mysql_select_db($database_conn, $conn);
$query_jj = "SELECT * FROM qa WHERE type = 'JavaScript'";
$jj = mysql_query($query_jj, $conn) or die(mysql_error());
$row_jj = mysql_fetch_assoc($jj);
$totalRows_jj = mysql_num_rows($jj);

 
 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>菜逼逼學前端</title>
<style type="text/css">
<!--
body {
	background-color: #DCE6E3;
}
.style2 {color: #FFFFFF}
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
.style7 {font-size: 42px}



 
 
#BoxText2 {
border:2px gray dashed;
padding:8px;
width:800px;
background-color:#fafafa;
}
.style9 {
	font-size: xx-large;
	color: #E54D28;
}
.style12 {color: #6D6D6D}
.style14 {font-size: x-large; color: #E54D28; }











.Qa-Box {
  width: 80%;
  margin: 0 auto;
}

.Qa-Box .Qa dt,
.Qa-Box .Qa dd {
  display: flex;
  align-items: baseline;
  margin: 15px 0;
  padding: 15px;
}

.Qa-Box .Qa dt {
  background: #F5F5F5;
}

.Qa-Box .Qa dt p {
  margin: 0;
  padding-left: 15px;
  font-weight: bold;
  width: 100%;
}

.Qa-Box .Qa dd p {
  margin: 0;
  padding-left: 15px;
  width: 100%;
}

.Qa-Box .Qa dt::before {
  content: "Q";
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  background: #6699B7;
  width: 2em;
  height: 2em;
}

.Qa-Box .Qa dd::before {
  content: "A";
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  background: #D65556;
  width: 2em;
  height: 2em;
}

@media screen and (max-width: 960px) {
  .Qa-Box {
    width: 95%;
  }
}






.myButton {
	box-shadow: 0px 10px 14px -7px #3e7327;
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	background-color:#77b55a;
	border-radius:14px;
	border:1px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:20px;
	font-weight:bold;
	padding:5px 48px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
}
.myButton:hover {
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	background-color:#72b352;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
 

</head>

<body>
<table width="200" border="1" align="center" bordercolor="#6E9170">
  <tr>
    <td><table width="1200" height="543" border="0" align="center">
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
        <td width="212" bgcolor="#30877E"><a href="html.html"><img src="images/HTML.JPG" width="211" height="54" border="0" /></a>
            <ul>
       <li "><a href="text.php?id=1" class="style2">環境創建</a><br /></li>  
<li "><a href="text.php?id=2" class="style2">基本標籤</a><br /></li>  
<li "><a href="text.php?id=3" class="style2">查看網頁架構</a><br /></li>  
<li "><a href="text.php?id=4" class="style2">列表及表格</a><br /></li>  
<li "><a href="text.php?id=5" class="style2">放入連結及圖片</a><br /></li>  
<li "><a href="text.php?id=6" class="style2">嵌入影片</a><br /></li>  
<li "><a href="text.php?id=7" class="style2">meta標籤</a><br /></li>  
<li "><a href="text.php?id=8" class="style2">div及span</a><br /></li>  
<li "><a href="text.php?id=9" class="style2">input及textarea</a><br /></li>  
          </ul></td>
        <td colspan="4" rowspan="5" valign="top"><p align="center">
           <a href="#t"> <button class="btn-dashed style3 style4">Q&A</button></a>
			
			<a href="about.html"> <button class="btn-dashed style3 style7">聯絡我們</button></a>
			 
			  <button class="btn-dashed style3 style7">VS Code 快捷鍵</button>
			
			 
			 	<a href="account.php"> 
		 	  <button class="btn-dashed style3 style7">會員專區</button></a>
				
				
        </p>
          <hr />
          <p align="center"> 
  <div id="BoxText2">
    <p><span class="style9"><a href="#" class="style3">熱門 Q&amp;A </a></span>    
    <hr />
    <p align="center"><span class="style14"><img src="images/qa.JPG" width="522" height="228" /><br />
      [<?php echo $_GET['type']?>]</span>
    <dl class="Qa-Box">
        <div class="Qa">
            <dt>
                <p>テキストテキスト？？</p>
            </dt>
            <dd>
                <p>テキストテキスト。</p>
            </dd>
        </div>
        
    </dl>

<hr>
<center>  <a href="index.php" class="myButton">回上頁</a></center>

</td>
      </tr>
      <tr bgcolor="#3D7D96">
        <td><a href="css.html"><img src="images/CSS.JPG" width="211" height="54" border="0" /></a></td>
      </tr>
      <tr bgcolor="#3D7D96">
        <td valign="top" bgcolor="#30877E"><ul>
         
		 <li "><a href="text.php?id=10" class="style2">撰寫CSS </a><br />
		 </li>  
<li "><a href="text.php?id=11" class="style2">color </a><br /></li>  
<li "><a href="text.php?id=12" class="style2">padding及margin </a><br /></li>  
<li "><a href="text.php?id=13" class="style2">float及display </a><br /></li>  
<li "><a href="text.php?id=14" class="style2">position </a><br /></li>  
<li "><a href="text.php?id=15" class="style2">opacity及border-radius</a><br /></li>  
<li "><a href="text.php?id=16" class="style2">style </a><br /></li>  
<li "><a href="text.php?id=17" class="style2">引入CSS </a><br /></li>  
<li "><a href="text.php?id=18" class="style2">class及id </a><br /></li>  
<li "><a href="text.php?id=19" class="style2">CSS選擇器 </a><br /></li>  
<li "><a href="text.php?id=20" class="style2">flex </a><br /></li>  
<li "><a href="text.php?id=21" class="style2">animation</a><br /></li>  
		 
		 
        </ul></td>
      </tr>
      <tr bgcolor="#3D7D96">
        <td><a href="js.html"><img src="images/JS.JPG" width="211" height="54" border="0" /></a></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#30877E"><ul>
           
		   
		   <li "><a href="text.php?id=22" class="style2">撰寫JS </a><br />
		   </li>  
<li "><a href="text.php?id=23" class="style2">資料型態及變數 </a><br /></li>  
<li "><a href="text.php?id=24" class="style2">使用字串 </a><br /></li>  
<li "><a href="text.php?id=25" class="style2">使用數字 </a><br /></li>  
<li "><a href="text.php?id=26" class="style2">製作計算機 </a><br /></li>  
<li "><a href="text.php?id=27" class="style2">array </a><br /></li>  
<li "><a href="text.php?id=28" class="style2">function </a><br /></li>  
<li "><a href="text.php?id=29" class="style2">if</a><br /></li>  
<li "><a href="text.php?id=30" class="style2">object </a><br /></li>  
<li "><a href="text.php?id=31" class="style2">真實世界物件 </a><br /></li>  
<li "><a href="text.php?id=32" class="style2">while迴圈 </a><br /></li>  
<li "><a href="text.php?id=33" class="style2">製作密碼檢驗程式 </a><br /></li>  
<li "><a href="text.php?id=34" class="style2">for迴圈 </a><br /></li>  
<li "><a href="text.php?id=35" class="style2">二維陣列及巢狀迴圈</a><br /></li>  
<li "><a href="text.php?id=36" class="style2">class </a><br /></li>  
<li "><a href="text.php?id=37" class="style2">取得html元素 </a><br /></li>  
<li "><a href="text.php?id=38" class="style2">event listener </a><br /></li>  
<li "><a href="text.php?id=39" class="style2">製作一個部落格</a><br /></li>  
		   
		   
        </ul></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="292">&nbsp;</td>
        <td width="226">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="321">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($html);

mysql_free_result($css);

mysql_free_result($jj);

 
?>
