<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>

<?php 

if(isset($_POST['submit'])){
	$ads_jscode = $_POST['ads_jscode'];
	$ads_showtype = $_POST['ads_showtype'];
	$ads_image = $_FILES['ads_image'];
	$name = $ads_image ['name'];
	$path ="../uploads/". basename($name);


	if (move_uploaded_file($ads_image ['tmp_name'], $path)) {
					    //echo "Moved";
					    //die();
	} else {
					    //echo "Cant Moved";
					    //die();
	}

	$name = $ads_image['name'];


	$sql = "INSERT INTO ads (ads_image, ads_jscode, ads_showtype) VALUE (?,?,?)";

	$statement = $mysql->prepare($sql);

	$statement->bind_param('sss', $name, $ads_jscode, $ads_showtype);

	$result = $statement->execute();
	if($result){
		header('Location: site_ads_setting.php?notification=1');
	}
	else{
		header('Location: site_ads_setting.php?error=1');
	}
}
else
	header('Location: site_ads_setting.php?error=2');

?>
<?php else: ?>
	<?php header('Location:../login.php?error=3') ;?>
<?php endif; ?>