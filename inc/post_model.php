<?php include_once 'db.php'; 

		$sql = "SELECT * FROM posts";

		$result = $mysql->query($sql);

		if(!$result){
		echo "Somethign wrong in your query\n";
		echo 'Your Erron no'.$mysql->connect_errno.'<br>';
		echo 'Your Error'.$mysql->connect_error.'<br>';
		exit;
		}


		$media_path='http://'.$_SERVER['SERVER_NAME'].'/iblog_evening'.'/uploads';
		$site_url = 'http://'.$_SERVER['SERVER_NAME'].'/iblog_evening';


