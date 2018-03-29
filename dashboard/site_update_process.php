<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
	?>

	<?php
	$site_id = $_POST['site_id'];
	$site_name = $_POST['site_name'];
	$site_url = $_POST['site_url'];
	$admin_email = $_POST['admin_email'];
	$description = $_POST['description'];
	$slogan = $_POST['slogan'];
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

	if($name!=''){

		$sql = "UPDATE site_settings SET site_name='$site_name', site_url='$site_url', site_admin_email='$admin_email', site_description='$description',site_slogan='$slogan', post_per_page= $post_per_page, site_logo='$name' WHERE site_id=$site_id ";
						// var_dump($sql);
						// die();
		$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

		if($result){
			header("Location: site_settings.php?notification=1");
		}
		else{
			header("Location: site_settings.php?error=1");
		}
	}
	else{
		$sql = "UPDATE site_settings SET site_name='$site_name', site_url='$site_url', site_admin_email='$admin_email', site_description='$description',site_slogan='$slogan', post_per_page= '$post_per_page'  WHERE site_id=$site_id";

		
		$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

		if($result){
			header("Location: site_settings.php?notification=1");
		}
		else{
			header("Location: site_settings.php?error=2");
		}		
	}

	?>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>