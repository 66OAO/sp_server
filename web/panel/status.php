<?php 
include("navbar.php");
?>
<?php
require_once 'dbconfig.php';
$stmt = $db_con->prepare("SELECT * FROM users WHERE usr_id=:uid");
$stmt->bindParam(":uid",$_SESSION['uid']);
$stmt->execute();
$row = $stmt->fetch();
$char_name = array(
"10" => "查洛",
"130" => "查洛",
"20" =>"夏姆",
"140" => "夏姆",
"30" => "史凡",
"150" => "史凡",
"40" => "奶油",
"160" => "奶油",
"50" => "羅蘭",
"170" => "羅蘭",
"60" => "愛瑞莉",
"180" => "愛瑞莉",
"70" => "隼",
"190" => "隼",
"80" => "哈潔兒",
"200" => "哈潔兒",
"90" => "卡菈",
"210" => "卡菈",
"100" => "瓦倫",
"220" => "瓦倫",
"110" => "露西",
"230" => "露西",
"120" => "威爾",
"240" => "威爾");
$char_photo = array(
"10" => "xyrho",
"130" => "xyrho",
"20" =>"shamoo",
"140" => "shamoo",
"30" => "sven",
"150" => "sven",
"40" => "cream",
"160" => "cream",
"50" => "roland",
"170" => "roland",
"60" => "aurelli",
"180" => "aurelli",
"70" => "hawk",
"190" => "hawk",
"80" => "hazel",
"200" => "hazel",
"90" => "cara",
"210" => "cara",
"100" => "warren",
"220" => "warren",
"110" => "lucy",
"230" => "lucy",
"120" => "will",
"240" => "will");
if($row[24] != NULL){
$year = $row[24] / 10000;
settype($year, "integer");
$year_correct = $year + 1900;
$month = ($row[24] - $year*10000)/100;
settype($month, "integer");
$day = $row[24] - $year*10000 - $month*100;
settype($day, "integer");
$date = "{$year_correct}年 {$month}月 {$day}日";
}
else
{
$date = "未有登入記錄!";
}
?>
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
.info{

border-style: solid;
  border-width: 5px;
  border-color: transparent;

}

</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>彩虹冒險用戶管理登入</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>

</head>

<body>


<div class="signin-form">

	<div class="container">
      <form class="form-signin" id="register-form">
        <h2 class="form-signin-heading"><center>彩虹冒險用戶管理</center></h2><hr />
        <div>
        <p>
        <center><span style="float: none;"><img src="image/<?php echo $char_photo[$row[5]]?>.png" height="170px" width="170px" border="1px" /></span>
        </p>
        <p>
        <table width="490" border="1" class="info">
          <tr>
            <td width="190">預設角色:</td>
            <td width="297"><center><?php echo $char_name[$row[5]]; ?></center></td>
        </tr>
          <tr>
            <td>Point: </td>
            <td><center><?php echo $row[6]; ?></center></td>
          </tr>
          <tr>
            <td>等級: </td>
            <td><center><?php echo $row[7]; ?></center></td>
          </tr>
          <tr>
            <td>Code: </td>
            <td><center><?php echo $row[8]; ?></center></td>
          </tr>
          <tr>
            <td>金幣: </td>
            <td><center><?php echo $row[9]; ?></center></td>
          </tr>
          <tr>
            <td>商城點數: </td>
            <td><center><?php echo $row[10]; ?></center></td>
          </tr>
          <tr>
            <td>白卡數量: </td>
            <td><center><font color="blue"><?php echo $row[11]; ?></font>|<font color="red"><?php echo $row[12]; ?></font>|<font color="brown"><?php echo $row[13]; ?></font>|<font color="green"><?php echo $row[14]; ?></font></center></td>
          </tr>
          <tr>
            <td>對戰戰績(勝場/敗場): </td>
            <td><center><?php echo $row[16]; ?>|<?php echo $row[17]; ?></center></td>
          </tr>
          <tr>
            <td>殺數/死數: </td>
            <td><center><?php echo $row[18]; ?>|<?php echo $row[19]; ?></center></td>
          </tr>
          <tr>
            <td>不可能的任務關卡: </td>
            <td><center><?php echo $row[23]; ?></center></td>
          </tr>
          <tr>
            <td>最後上線日期: </td>
            <td><center><?php echo $date; ?></center></td>
          </tr>
        </table>
      </form>
      </div>
      </p>
      </center>
    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>