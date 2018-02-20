<?php 

	ob_start();
	session_start(); // to start all sessions for a particular URI 
	include_once 'inc/db.php';
	if(isset($_POST['username']) && isset($_POST['password']) ){
		$username = $_POST['username'];
		$password = $_POST['password'];
		


		$sql = "SELECT user_id,username,password FROM users WHERE username='$username' AND password=md5('$password')";

		// var_dump($sql);

		$result = $mysql->query($sql);

		if(!$result){
		echo "Somethign wrong in your query\n";
		echo 'Your Erron no'.$mysql->connect_errno.'<br>';
		echo 'Your Error'.$mysql->connect_error.'<br>';
		exit;
		}
		
			//var_dump($result);
			//die();
	

		if($result->num_rows === 1){
			// login successful
			$_SESSION['isLoggedIn']='yes';
			while($user = $result->fetch_assoc()){
				$_SESSION['user_id']= $user['user_id'];
			}
			
			header('Location: dashboard');
		}
		else
		{
			// login unsuccesful
			header('Location: login.php?error=1');
		}

	}
	else{
		header('Location: login.php?error=1');
	}



 ?>