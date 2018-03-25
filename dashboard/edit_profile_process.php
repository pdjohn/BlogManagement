<?php 
include_once '../inc/db.php';
ob_start();
session_start();
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>

<?php 
$user_info_id = $_POST['user_info_id'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$short_bio = $_POST['short_bio'];
$bio = $_POST['bio'];
$facebook_username = $_POST['facebook_username'];
$twitter_handle = $_POST['twitter_handle'];
$website = $_POST['website'];
$address = $_POST['address'];

$profile_pic = $_FILES['profile_pic'];
$name = $profile_pic ['name'];
$path ="../uploads/". basename($name);

if (move_uploaded_file($profile_pic['tmp_name'], $path)) {
					    // echo "Moved";
					    // die();
} else {
					    // echo "Cant Moved";
					    // die();
}

$name = $profile_pic['name'];

if($name!=''){

	$sql = "UPDATE user_info SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name', profile_pic='$name', short_bio='$short_bio', bio='$bio',facebook_username='$facebook_username', twitter_handle= '$twitter_handle', website='$website', address='$address' WHERE user_info_id=$user_info_id ";
						// var_dump($sql);
						// die();
	$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

	if($result){
		header("Location: edit_profile.php?notification=1");
	}
	else{
		header("Location: edit_profile.php?error=1");
	}
}
else{
	$sql = "UPDATE user_info SET first_name='$first_name',middle_name='$middle_name',last_name='$last_name', short_bio='$short_bio', bio='$bio',facebook_username='$facebook_username', twitter_handle= '$twitter_handle', website='$website', address='$address' WHERE user_info_id=$user_info_id ";


	$result = $mysql->query($sql);
						// We can check any user existence using the query above. But here it has no effect on our code.

	if($result){
		header("Location: edit_profile.php?notification=1");
	}
	else{
		header("Location: edit_profile.php?error=2");
	}		
}

?>
<?php else: ?>
	<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>