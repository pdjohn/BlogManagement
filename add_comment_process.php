<?php 
include_once 'inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes' ||  $_SESSION['isLoggedIn']==''):
	?>
	<?php 
	if(isset($_POST['name']) && isset($_POST['post_id']) && isset($_POST['email']) && isset($_POST['comment']) && isset($_POST['comment_parent'])){

		$comment_parent = $_POST['comment_parent'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];
		$post_id = $_POST['post_id'];
		$comment_ip = $_POST['comment_ip'];

		$sql = "INSERT INTO comments (post_id,name,email,comment,comment_parent,comment_ip) VALUE (?,?,?,?,?,?)";
		$statement = $mysql->prepare($sql);

		$statement->bind_param('isssis',$post_id,$name,$email,$comment,$comment_parent,$comment_parent);

		$result = $statement->execute();
		// var_dump($result);
		// die();

		if($result){
			header("Location:viewpost.php?post_id=$post_id");
		}
		else{
			header("Location:viewpost.php?post_id=$post_id&error=1");
		}


	}
	else
		header("Location: viewpost.php?post_id=$post_id");

	?>




<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>