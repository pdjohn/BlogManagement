<?php 
	include_once '../inc/db.php';
	ob_start();
	session_start();
	if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
 /*

	user role type :
	0 - no role 
	1 - admin 
	2 - user 
 */ 

 ?>

	<?php 
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];
		$active = $_POST['active'];
		$email = $_POST['email'];

		//$sql_username = "SELECT user_id from users WHERE username ='$username'";
		//$result_username = $mysql->query($sql_username);

		// We can check any user existence using the query above. But here it has no effect on our code. 

			if(isset($_POST['password']) && $_POST['password']!='' ){
				//blank i.e old password
				
				$sqlnotblank ="UPDATE users SET password=md5('$password'),user_type=$user_type,active=$active,email='$email' WHERE user_id=$user_id";

					// var_dump($sqlnotblank);
					// die();
				$result_not_blank = $mysql->query($sqlnotblank);
			
			if(!$result_not_blank){
				header('Location: edit_user.php?user_id=$user_id&error=1');
			}
			else{
				header("Location: edit_user.php?user_id=$user_id&notification=1");
			}


			}
			else{

				$sqlblank ="UPDATE users SET user_type='$user_type',active=$active,email='$email' WHERE user_id=$user_id";

	
				$result_blank = $mysql->query($sqlblank);
			
			if(!$result_blank){
				header("Location: edit_user.php?user_id=$user_id&error=2");
			}
			else{
				header("Location: edit_user.php?user_id=$user_id&notification=2");
			}		
	}

	 ?>
<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>