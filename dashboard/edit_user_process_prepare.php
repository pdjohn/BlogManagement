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


			if(isset($_POST['password']) && $_POST['password']!='' ){
				//blank i.e old password
				
				$sqlnotblank ="UPDATE users SET username = ?,password=md5(?),user_type=?,active=?,email=?WHERE user_id=?";


			$stmt_not_blank = $mysql->prepare($sqlnotblank);

			$stmt_not_blank->bind_param('ssssss',$username,$password,$user_type,$active,$email,$user_id);
			$result_not_blank = $stmt_not_blank->execute();

			if(!$result_not_blank){
				header('Location: edit_user.php?user_id=$user_id&error=1');
			}
			else{
				header('Location: edit_user.php?user_id=$user_id&notification=1');
			}


			}
			else{

				$sqlblank ="UPDATE users SET username = ?,user_type=?,active=?,email=? WHERE user_id=?";
			$stmt_blank = $mysql->prepare($sqlblank);
			$stmt_blank->bind_param('sssss',$username,$user_type,$active,$email,$user_id);
			var_dump($stmt_blank);die();
			$result_blank = $stmt_blank->execute();

				var_dump($result_blank);
				die();
			if(!$result_blank){
				header("Location: edit_user.php?user_id=$user_id&error=2");
			}
			else{
				header('Location: edit_user.php?user_id=$user_id&notification=2');
			}
			}

	 ?>




<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>