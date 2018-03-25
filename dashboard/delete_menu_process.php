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
	<?php if(isset($_POST['menu_id']) && $_POST['menu_id']!='')
	$menu_id = $_POST['menu_id'];

	// var_dump($menu_id);
	// die();

	$delete = $_POST['delete'];


	$sql = "DELETE FROM menu where menu_id=$menu_id";
	$result = $mysql->query($sql);

	

	if($result){
		header('Location: menu.php');
	}
	else{
		echo "Couldn't delete";
		echo '<a href="menu.php">'.'</br>'.'Go Back</a>';
	}
	?>
</body>
</html>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>