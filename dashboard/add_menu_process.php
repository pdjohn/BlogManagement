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


			if(isset($_POST['menu_title']) && isset($_POST['menu_link'])){

				if($_POST['menu_title']=='' || $_POST['menu_link']=='' ){
					header('Location: add_menu.php?error=1');
				}
				else{
					$sql = "INSERT INTO menu (menu_title,menu_link,menu_parent) VALUE (?,?,?)";
					
					$statement = $mysql->prepare($sql);

					$statement->bind_param('ssi',$_POST['menu_title'],$_POST['menu_link'],$_POST['menu_parent']);

					$result = $statement->execute();

					// var_dump($result);
					// die();

					if($result){
						header('Location: add_menu.php?notification=1');
					}
					else{
						header('Location: add_menu.php?error=1');
					}

				}
			}
			else
				header('Location: add_menu.php?error=1');

	 ?>
<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>