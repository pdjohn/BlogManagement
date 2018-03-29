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
	<?php if(isset($_POST['post_id']) && $_POST['post_id']!='')
	$post_id = $_POST['post_id'];
	$delete = $_POST['delete'];


	$sql = "DELETE FROM posts where post_id=$post_id";
	$result = $mysql->query($sql);

	if($result){
		header('Location: posts.php');
	}
	else{
		echo "Couldn't delete";
		echo '<a href="posts.php">'.'</br>'.'Go Back</a>';
	}
	?>
</body>
</html>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>