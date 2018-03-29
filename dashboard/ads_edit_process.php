<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
	?>

	<?php
	$ads_id = $_POST['ads_id'];
	$ads_image = $_POST['ads_image'];
	$ads_jscode =$_POST['ads_jscode'];
	$ads_showtype =$_POST['ads_showtype'];
	$ads_jscode= $mysql->real_escape_string($ads_jscode);

	$ads_image = $_FILES['ads_image'];
	$name = $ads_image['name'];
	$path ="../uploads/". basename($name);


	if (move_uploaded_file($ads_image['tmp_name'], $path)) {

					    //echo "Moved";
					    //die();
	} else {
					    //echo "Cant Moved";
					    //die();
	}

	if($name!=''){

		$sql = "UPDATE ads SET ads_image='$name', ads_jscode='$ads_jscode', ads_showtype = '$ads_showtype' WHERE ads_id=$ads_id";
						// var_dump($sql);
						// die();
		$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

		if($result){
			header("Location: edit_ads.php?ads_id=$ads_id&notification=1");
		}
		else{
			header("Location: edit_ads.php?ads_id=$ads_id&error=1");
		}
	}
	else{
		$sql = "UPDATE ads SET ads_jscode='$ads_jscode', ads_showtype = '$ads_showtype' WHERE ads_id=$ads_id";


		$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

		if($result){
			header("Location: edit_ads.php?ads_id=$ads_id&notification=1");
		}
		else{
			header("Location: edit_ads.php?ads_id=$ads_id&error=2");
		}		
	}

	?>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>