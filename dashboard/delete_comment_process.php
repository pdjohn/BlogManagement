<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete</title>
</head>
<body>
	<?php if(isset($_POST['comment_id']) && $_POST['comment_id']!=''){
		$comment_id = $_POST['comment_id'];
		$delete = $_POST['delete'];
	}
	if ($delete === 'yes') {
		$sql = "DELETE FROM comments where comment_id=$comment_id";
		$result = $mysql->query($sql);

		if($result){
			header('Location: comment.php');
		}
		else{
			echo "Couldn't delete";
			echo '<a href="comment.php">'.'</br>'.'Go Back</a>';
		}

	}
	else{
		header('Location: comment.php');
	}	
	

	
	?>
</body>
</html>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>