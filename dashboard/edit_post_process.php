<?php 
	include_once '../inc/db.php';
	ob_start();
	session_start();
	if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
 ?>

	<?php

		$post_id = $_POST['post_id'];
		$post_title = $_POST['post_title'];
		$post_content =$_POST['post_content'];
		$post_content= $mysql->real_escape_string($post_content);

			 $post_thumbnail = $_FILES['post_thumbnail'];
					 $name = $post_thumbnail['name'];
					 $path ="../uploads/". basename($name);
					 
					 
					 if (move_uploaded_file($post_thumbnail['tmp_name'], $path)) {

					    //echo "Moved";
					    //die();
					} else {
					    //echo "Cant Moved";
					    //die();
					}

				if($name!=''){

						$sql = "UPDATE posts SET post_title='$post_title', post_content='$post_content', post_thumbnail='$name' WHERE post_id=$post_id ";
						// var_dump($sql);
						// die();
						$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

						if($result){
										header("Location: edit_post.php?post_id=$post_id&notification=1");
									}
									else{
										header("Location: edit_post.php?post_id=$post_id&error=1");
									}
				}
				else{
						$sql = "UPDATE posts SET post_title='$post_title', post_content='$post_content' WHERE post_id=$post_id";

					
						$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

						if($result){
										header("Location: edit_post.php?post_id=$post_id&notification=1");
									}
									else{
										header("Location: edit_post.php?post_id=$post_id&error=2");
									}		
				}

	 ?>
<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>