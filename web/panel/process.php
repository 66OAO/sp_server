<?php session_start(); ?>
<?php
require_once 'dbconfig.php';
if($_POST)
{
		if($_POST['action']=="login"){
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT usr_id FROM users WHERE usr_name=:name");
			$stmt->execute(array(":name"=>$user_name));
			$count = $stmt->rowCount();
			if($count!=0){
			$stmt = $db_con->prepare("SELECT usr_id FROM users WHERE usr_name=:uname and usr_pw=:pass");
			$stmt->bindParam(":uname",$user_name);
			$stmt->bindParam(":pass",$password);
			$stmt->execute();
			$row = $stmt->fetch();
            $_SESSION['uid'] = $row[0];
			echo "登入中!";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=panel.php>';
			}
			else{
				
				echo "帳戶不存在或密碼錯誤!"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		}
		elseif($_POST['action']=="changepw"){
		try
		{	
		
			$stmt = $db_con->prepare("SELECT usr_pw FROM users WHERE usr_id=:uid and usr_pw=:original_pw");
			$stmt->bindParam(":uid",$_SESSION['uid']);
			$stmt->bindParam(":original_pw",$_POST['original_pw']);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count!=0){
			$stmt = $db_con->prepare("UPDATE users SET usr_pw=:new_pw WHERE usr_id=:uid and usr_pw=:original_pw");
			$stmt->bindParam(":new_pw",$_POST['new_pw']);
			$stmt->bindParam(":uid",$_SESSION['uid']);
			$stmt->bindParam(":original_pw",$_POST['original_pw']);
			$stmt->execute();
			echo "已更改!";
			}
			else{
				
				echo "原有密碼錯誤!"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
			
}else{
echo "非法操作!";
}

?>