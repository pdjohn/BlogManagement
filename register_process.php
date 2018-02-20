<?php 
	include_once 'inc/db.php';
	// ob_start();
	// session_start();
	// if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
 /*

	user role type :
	0 - no role 
	1 - admin 
	2 - user 
 */ 

 ?>

	<?php 

			if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){

				if($_POST['username']=='' || $_POST['password']=='' || $_POST['email']=='' ){
					header('Location: register.php?error=1');
				}
				else{

					$sql = "INSERT INTO users (username,password,email) VALUE (?,md5(?),?)";
					$statement = $mysql->prepare($sql);

					$statement->bind_param('sss',$_POST['username'],$_POST['password'],$_POST['email']);

					$result = $statement->execute();

					// var_dump($result);
					// die();

					if($result){
						header('Location: login.php?notification=1');
					}
					else{
						header('Location: register.php?error=2');
					}

				}
			}
			else
				header('Location: register.php?error=3');

	 ?>




