<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>
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

	if ($delete === 'yes') {
		$sql = "DELETE FROM user_info where user_id=$user_id";
		$result = $mysql->query($sql);

		if($result){
			header('Location: profiles.php');
		}
		else{
			echo "Couldn't delete";
			echo '<a href="profiles.php">'.'</br>'.'Go Back</a>';
		}

	}
	else{
		header('Location: profiles.php');
	}	
	?>
</body>
</html>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>