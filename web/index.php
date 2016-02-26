<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>彩虹冒險註冊</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>

<script type="text/javascript" src="validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script type="text/javascript" src="script.js"></script>

</head>

<script type="text/javascript">
alert("這是我們熟識的彩虹冒險!");
</script>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://127.0.0.1/" target="_blank" title="Survival Project">Survival Project</a>
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
            <li><a href="http://127.0.0.1/panel">會員管理後台</a></li>

<!--           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              功能表 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" target="_blank">帳號註冊</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#" target="_blank">增加白卡</a></li>
              </ul>
            </li>

          </ul>
-->
        </div>
      </div>
</nav>

    
<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">彩虹冒險註冊</h2><hr />
        
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="帳號" name="user_name" id="user_name" />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="密碼" name="password" id="password" />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="確認密碼" name="cpassword" id="cpassword" />
        </div>
     	<hr />
        
        <div class="form-group">
            <center><button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; 註冊
			</button>
            </center> 
        </div>  
      
      </form>

    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>