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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if(isset($_POST['user_id']) && $_POST['user_id']!='')
			$user_id = $_POST['user_id'];
			$delete = $_POST['delete'];

			if($delete === 'yes'){
				if($user_id == $_SESSION['user_id']){
					echo "You can not delete yourself while you are logged in";
					echo '<a href="users.php">'.'Go Back</a>';
				}
				else{
					$sql = "DELETE FROM users where user_id=$user_id";
					$result = $mysql->query($sql);

					if($result)
					header('Location: users.php');
					else{
						echo "Couldn't delete";
						echo '<a href="users.php">'.'Go Back</a>';
					}
				}
			}	
			else{
				header('Location: users.php');
			}
	 ?>
</body>
</html>
<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>