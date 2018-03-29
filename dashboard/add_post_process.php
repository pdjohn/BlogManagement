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


			if(isset($_POST['post_title']) && isset($_POST['post_content'])){

				if($_POST['post_title']=='' || $_POST['post_content']=='' ){
					header('Location: add_post.php?error=1');
				}
				else{

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

					$name = $post_thumbnail['name'];
				

					$sql = "INSERT INTO posts (post_title,post_content,user_id,post_thumbnail) VALUE (?,?,?,?)";
					$statement = $mysql->prepare($sql);

					$statement->bind_param('ssis',$_POST['post_title'],$_POST['post_content'],$_SESSION['user_id'],$name);

					$result = $statement->execute();

					if($result){
						header('Location: add_post.php?notification=1');
					}
					else{
						header('Location: add_post.php?error=1');
					}

				}
			}
			else
				header('Location: add_post.php?error=1');

	 ?>




<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>