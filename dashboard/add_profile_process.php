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


			// if(isset($_POST['first_name']) && isset($_POST['profile_pic'])){

				if($_POST['first_name']=='' || $_POST['last_name']=='' ){
					header('Location: add_profile.php?error=1');
				}
				else{

					 $profile_pic = $_FILES['profile_pic'];
					 $name = $profile_pic['name'];
					 $path ="../uploads/". basename($name);
					 
					 
					 if (move_uploaded_file($profile_pic['tmp_name'], $path)) {
					    //echo "Moved";
					    //die();
					} else {
					    //echo "Cant Moved";
					    //die();
					}

					$name = $profile_pic['name'];
				

					$sql = "INSERT INTO user_info (first_name,middle_name,last_name,profile_pic,short_bio,bio,facebook_username,twitter_handle,website,address) VALUE (?,?,?,?,?,?,?,?,?,?)";
					$statement = $mysql->prepare($sql);

					$statement->bind_param('ssssssssss',
						$_POST['first_name'],
						$_POST['middle_name'],
						$_POST['last_name'],
						$name,
						$_POST['short_bio'],
						$_POST['bio'],
						$_POST['facebook_username'],
						$_POST['twitter_handle'],
						$_POST['website'],
						$_POST['address']);


					$result = $statement->execute();

					if($result){
						header('Location: add_profile.php?notification=1');
					}
					else{
						header('Location: add_profile.php?error=2');
					}

				}
			// else
			// 	header('Location: add_profile.php?error=3');

	 ?>




<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>