<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
	?>

	<?php

	$menu_id = $_POST['menu_id'];
	$menu_title = $_POST['menu_title'];
	$menu_link = $_POST['menu_link'];
	$menu_parent=$_POST['menu_parent'];


	$sql = "UPDATE menu SET menu_title='$menu_title', menu_parent='$menu_parent' WHERE menu_id='$menu_id'";

	
	$result = $mysql->query($sql);
		// We can check any user existence using the query above. But here it has no effect on our code.

	// var_dump($result);
	// die();

	if($result)
	{
		header("Location: edit_menu.php?menu_id=$menu_id&notification=1");
	}
	else{
		header("Location: edit_menu.php?menu_id=$menu_id&error=2");
	}		


	?>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>