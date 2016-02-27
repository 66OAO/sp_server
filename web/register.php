<?php
	
	require_once 'dbconfig.php';

	if($_POST)
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM users WHERE usr_name=:name");
			$stmt->execute(array(":name"=>$user_name));
			$count = $stmt->rowCount();
			
			if($count==0){
				
			$stmt = $db_con->prepare("INSERT INTO users(usr_name,usr_pw) VALUES(:uname, :pass); INSERT INTO equipments(eqp_mag) VALUES (-1)");
			$stmt->bindParam(":uname",$user_name);
			$stmt->bindParam(":pass",$password);
					
				if($stmt->execute())
				{
					echo "註冊成功";
				}
				else
				{
					echo "無法執行指令!";
				}
			
			}
			else{
				
				echo "帳戶已存在!"; //  not available
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>