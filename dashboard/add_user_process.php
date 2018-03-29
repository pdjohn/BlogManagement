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

			if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user_type']) && isset($_POST['active']) && isset($_POST['email'])){

				if($_POST['username']=='' || $_POST['password']=='' || $_POST['user_type']=='' || $_POST['active']=='' || $_POST['email']=='' ){
					header('Location: add_user.php?error=1');
				}
				else{

					$sql = "INSERT INTO users (username,password,user_type,active,email) VALUE (?,md5(?),?,?,?)";
					$statement = $mysql->prepare($sql);

					$statement->bind_param('ssiis',$_POST['username'],$_POST['password'],$_POST['user_type'],$_POST['active'],$_POST['email']);

					$result = $statement->execute();

					if($result){
						header('Location: add_user.php?notification=1');
					}
					else{
						header('Location: add_user.php?error=1');
					}

				}
			}
			else
				header('Location: add_user.php?error=1');

	 ?>




<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>