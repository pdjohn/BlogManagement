<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
	?>

	<?php
	$comment_id = $_POST['comment_id'];
	$user_id = $_POST['user_id'];
	$email = $_POST['email'];
	$subject =$_POST['subject'];
	$comment =$_POST['comment'];
	$comment_ip = $_POST['comment_ip'];

	$sql = "UPDATE comments SET user_id='$user_id', email='$email', comment='$comment', comment_ip='$comment_ip' WHERE comment_id = $comment_id";
	$result = $mysql->query($sql);

	if($result){
		header("Location: edit_comment.php?comment_id=$comment_id&notification=1");
	}
	else{
		header("Location: edit_comment.php?comment_id=$comment_id&error=1");
	}
	?>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>