<?php 
include("navbar.php");
?>
<?php
require_once 'dbconfig.php';
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
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="原有密碼" name="original_pw" id="original_pw" />
        <input type="password" class="form-control" placeholder="新密碼" name="new_pw" id="new_pw" />
        
        <input type="password" class="form-control" placeholder="再次輸入新密碼" name="new_cpw" id="new_cpw" />
        <input type="hidden" name="action" id="action" value="changepw"/>
        </div>
     	<hr />
        
        <div class="form-group">
            <center><button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; 更改
			</button>
            </center> 
        </div>  
      </form>
      </div>
      </p>
      </center>
    </div>
    
</div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>