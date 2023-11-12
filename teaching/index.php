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
           <a href="qa_all.php"> <button class="btn-dashed style3 style4">Q&A</button></a>
			
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
    <p><span class="style14">HTML</span>
      <?php do { ?>
    <LI><a href="qa.php?type=html&amp;id=<?php echo $row_html['n_id']; ?>" class="style12"><?php echo $row_html['n_title']; ?></a></LI>
    <br><?php } while ($row_html = mysql_fetch_assoc($html)); ?>

  
<p>
 <span class="style14">CSS</span>


 <?php do { ?>
    <LI><a href="qa.php?type=css&amp;id=<?php echo $row_css['n_id']; ?>" class="style12"><?php echo $row_css['n_title']; ?></a></LI>
    <br><?php } while ($row_css = mysql_fetch_assoc($css)); ?>
	
	 
 
<p>
  <span class="style14">JavaScript</span>
 <?php do { ?>
    <LI><a href="qa.php?type=JavaScript&amp;id=<?php echo $row_jj['n_id']; ?>" class="style12"><?php echo $row_jj['n_title']; ?></a></LI>
    <br><?php } while ($row_jj = mysql_fetch_assoc($jj)); ?>
 
	 
	 
	 
  </div>
  
  <P>
    <div id="BoxText2">
    <p><span class="style9"><a href="#" class="style3">VS Code快捷鍵</a></span>
     
	 
	 
	 <LI>  <span class="style12"> Ctrl + Shift + N 開啟編輯器新視窗</span></p></LI>
<LI>  <span class="style12"> Ctrl + Shift + W 關閉編輯器</span></p></LI>
<LI>  <span class="style12"> Ctrl + Shift + P 或 F1 開啟命令選擇區</span></p></LI>
<LI>  <span class="style12"> Ctrl + Shift + M 開啟問題顯示區</span></p></LI>
<LI>  <span class="style12"> Ctrl + Shift + O 尋找標籤區域</span></p></LI>
<LI>  <span class="style12"> Ctrl + Shift + S 另存新檔</span></p></LI>
<LI>  <span class="style12"> Ctrl + K Ctrl + C 切換行註解</span></p></LI>
<LI>  <span class="style12">  Ctrl + K Ctrl + U 取消行註解</span></p></LI>
<LI>  <span class="style12"> Ctrl + A 全選</span></p></LI>
<LI>  <span class="style12"> Ctrl + B 開啟 / 關閉檔案總管</span></p></LI>
<LI>  <span class="style12"> Ctrl + C 複製</span></p></LI>
<LI>  <span class="style12"> Ctrl + D 選取一段字詞</span></p></LI>
<LI>  <span class="style12"> Ctrl + E 搜尋游標位置的字詞</span></p></LI>
<LI>  <span class="style12"> Ctrl + F 開啟搜尋</span></p></LI>
<LI>  <span class="style12"> Ctrl + G 開啟搜尋</span></p></LI>
<LI>  <span class="style12"> Ctrl + I 選取游標位置的整行</span></p></LI>
<LI>  <span class="style12"> Ctrl + J 開啟問題顯示區</span></p></LI>
<LI>  <span class="style12"> Ctrl + K 要搭配其他指令才有作用</span></p></LI>
<LI>  <span class="style12"> Ctrl + N 開啟新檔案</span></p></LI>
<LI>  <span class="style12"> Ctrl + O 開啟...</span></p></LI>
<LI>  <span class="style12"> Ctrl + P 最近打開的文件</span></p></LI>
<LI>  <span class="style12"> Ctrl + Q 結束 VSCode</span></p></LI>
<LI>  <span class="style12"> Ctrl + S 儲存</span></p></LI>
<LI>  <span class="style12"> Ctrl + T 搜尋符號</span></p></LI>
<LI>  <span class="style12"> Ctrl + U 游標回上一位置</span></p></LI>
<LI>  <span class="style12"> Ctrl + V 搜尋符號</span></p></LI>
<LI>  <span class="style12"> Ctrl + W 關閉檔案</span></p></LI>
<LI>  <span class="style12"> Ctrl + X 剪下</span></p></LI>
<LI>  <span class="style12"> Ctrl + Z 回上一步</span></p></LI>
	 
	 
	 
  </div>
  
		  
		  </p></td>
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
