<?php 
	include_once '../inc/db.php';
	ob_start();
	session_start();
	if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>

	<?php 
			// var_dump($_POST);
			// die();
		
			if(isset($_POST['submit'])){
					$site_name = $_POST['site_name'];
					$site_url = $_POST['site_url'];
					$admin_email = $_POST['admin_email'];
					$site_description = $_POST['description'];
					$site_slogan = $_POST['slogan'];
					$post_per_page = $_POST['post_per_page'];

					 $site_logo = $_FILES['site_logo'];
					 $name = $site_logo['name'];
					 $path ="../uploads/". basename($name);
					 
					 
					 if (move_uploaded_file($site_logo['tmp_name'], $path)) {
					    //echo "Moved";
					    //die();
					} else {
					    //echo "Cant Moved";
					    //die();
					}

					$name = $site_logo['name'];
				

					$sql = "INSERT INTO site_settings (site_name,site_logo,site_url,site_admin_email,site_description,site_slogan,post_per_page) VALUE (?,?,?,?,?,?,?)";

					$statement = $mysql->prepare($sql);



					$statement->bind_param('ssssssi', $site_name, $name, $site_url, $admin_email, $site_description, $site_slogan, $post_per_page);



					$result = $statement->execute();
					if($result){
						header('Location: site_settings.php?notification=1');
					}

					// var_dump($result);
					// die();
					else{
						// header('Location: site_settings.php?error=1');
					}
					}
			else
				header('Location: site_settings.php?error=2');

	 ?>




<?php else: ?>
<?php header('Location:../login.php?error=3') ;?>
<?php endif; ?>