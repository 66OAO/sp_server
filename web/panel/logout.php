<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
        <h2 class="form-signin-heading"><center>登出中</center></h2><hr />
        <?php
//將session清空
unset($_SESSION['uid']);
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>
        </div>  
</form>
    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
