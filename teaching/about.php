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
.style9 {
	font-size: xx-large;
	color: #E54D28;
}
.style12 {color: #6D6D6D}


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
.style19 {color: #04684E}
.style21 {color: #407638}









 

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
 
 
 
 
 
 
 
</style>
 

</head>

<body>
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
            <button class="btn-dashed style3 style4">連絡我們</button>
          </a>
               
        </p>
            <hr />
			
 
 
 
 
  
  
  
  <section class="main">
        <div class="main-intro">
            <img src="images/a.jpg" alt="" width="1200" height="630">
            <h2 id="h0">樱木花道 （日本漫画《灌篮高手》中的主人公）</h2>
            <p>樱木花道（さくらぎはなみち；Hanamichi Sakuragi），漫画作品《灌篮高手》的主人公。神奈川县湘北高中高一学生，湘北篮球队的主力队员之一，司职大前锋。</p>
            <p>樱木是一个头脑简单却又不失可爱的问题人物，他的个性既豪爽又单纯，某些时候纯情的他好似一个长不大的孩子，有时又变得自大得目中无人，敢于断言自己就是天才，自信心十足。 </p>
            <p>他是井上雄彦笔下最成功的人物之一。</p>
         

        </div>
        <div class="main-part">
            <h3 id="h1">人物关系</h3>
            <ul>
                <li>
                    <img src="images/b.jpg" alt="">
                    <h4 id="h2"> 喜欢的人 赤木晴子</h4>
                    <p>赤木晴子(あかぎ はるこ)是日本动漫《灌篮高手》中的女性角色，湘北高中高一年级学生，校篮球队长赤木刚宪的妹被男主人公樱木花道暗恋，发现樱木异于常人的身体素质后便引荐进入湘北篮球队。是樱木打好篮球的重要动力，暗恋的人.....</p>
                </li>
                <li>
                    <img src="images/c.jpg" alt="">
                    <h4 id="h3"> 队友&死对头 流川枫</h4>
                    <p>日本动漫《灌篮高手》中的第二男主角。湘北高中篮球队的王牌球员，司职小前锋，神奈川县五日本青少年.........</p>
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
