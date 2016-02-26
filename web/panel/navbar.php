<?php session_start(); ?>
<?php
if(!isset($_SESSION['uid']))
{
        echo '<script type="text/javascript">
alert("您無權限觀看此頁面!");
</script>';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}else{
	require_once 'dbconfig.php';
$stmt = $db_con->prepare("SELECT usr_name FROM users WHERE usr_id=:uid");
$stmt->bindParam(":uid",$_SESSION['uid']);
$stmt->execute();
$row = $stmt->fetch();
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://127.0.0.1/" target="_blank" title="Coding Cage Programming Blog">Survival Project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a target="_blank"><?php
$connection = @fsockopen("127.0.0.1", 21000);
if ($connection) {
    echo 'Login Server:', '<font color="#52D017">','Online','</font>';
    fclose($connection);
} else {
    echo 'Login Server:', '<font color="#FF0000">','Offline','</font>';
}
?></a></li>
            <li><a target="_blank"><?php
$connection = @fsockopen("127.0.0.1", 9303);
if ($connection) {
    echo 'Channal 1 Server:', '<font color="#52D017">','Online','</font>';
    fclose($connection);
} else {
    echo 'Channel 1 Server:', '<font color="#FF0000">','Offline','</font>';
}
?></a></li>
            <li><a target="_blank"><?php
$connection = @fsockopen("127.0.0.1", 9304);
if ($connection) {
    echo 'Channal 2 Server:', '<font color="#52D017">','Online','</font>';
    fclose($connection);
} else {
    echo 'Channel 2 Server:', '<font color="#FF0000">','Offline','</font>';
}
?></a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              功能表 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="status.php">用戶狀態</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">增加白卡</a></li>
              </ul>
             <li><a href="logout.php">[<?php echo $row[0] ?>]登出</a></li>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</nav>