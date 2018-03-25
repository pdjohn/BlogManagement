<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php if(isset($_POST['ads_id']) && ($_POST['ads_id']!='')){
		$ads_id = $_POST['ads_id'];
		$delete = $_POST['delete'];

		if($delete == 'yes'){
			$sql = "DELETE FROM ads where ads_id=$ads_id";
			$result = $mysql->query($sql);
			header('Location: all_ads.php?notification=1');
		}
		else{
			header('Location: all_ads.php?error=1');
		}
	}
	?>
</body>
</html>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>