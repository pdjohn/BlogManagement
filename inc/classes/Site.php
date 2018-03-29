<?php 
include_once 'config.php';
	class Site extends Database{

		static $media_path ='http://'.server_path.'/Incubator/php_oop_iblog_final_class(edited)'.'/uploads';
		static $site_url   ='http://'.server_path.'/Incubator/php_oop_iblog_final_class(edited)';


		public function display_logo($media_path){
		//global $mysql;
		$sql = "SELECT * FROM site_settings";
		$result = $this->mysql->query($sql);

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}

			while($logo = $result->fetch_assoc()){
				$site_logo = $logo['site_logo'];
				$site_name = $logo['site_name'];
				$site_url = $logo['site_url'];
				$admin_email = $logo['site_admin_email'];
				$description = $logo['site_description'];
				$slogan = $logo['site_slogan'];
				$post_per_page = $logo['post_per_page'];
		                            // echo $site_logo;
				return  '<img src="'.$media_path.'/'.$site_logo.'" alt="" width="200" height="100">';

			} 
		}
	}

 ?>