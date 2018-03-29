<?php 
//include_once 'db.php';
include_once 'db.php';
	// Give us the blog username
	function blog_author($user_id=0){
				 
				global $mysql;
				if($user_id ===0){
					return false;

				}
				$sql = "SELECT username FROM users WHERE user_id=$user_id";
					$result = $mysql->query($sql);

				if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
				}

				if($result->num_rows ==1){
					while($user = $result->fetch_assoc()){
						$username = $user['username'];
						return $username;
					}
				}
			}

	// Limit no of word in excerpt of any page
	function limit_words($string, $word_limit)
	{
	    $words = explode(" ",$string);
	    return implode(" ", array_splice($words, 0, $word_limit));
	}

	// show single post content
	function single_post($post_id=false){

		global $mysql;

		if($post_id == false)
			return false;
		
		$single_post_sql = "SELECT * FROM posts WHERE post_id=$post_id";

		$single_post_result = $mysql->query($single_post_sql);

		if(!$single_post_result){
		echo "Somethign wrong in your query\n";
		echo 'Your Erron no'.$mysql->connect_errno.'<br>';
		echo 'Your Error'.$mysql->connect_error.'<br>';
		exit;
		}

		return $single_post_result;
	}

	// Query all post

	function all_post(){

		global $mysql;
		
		$sql = "SELECT * FROM posts";

		$result = $mysql->query($sql);

		if(!$result){
		echo "Somethign wrong in your query\n";
		echo 'Your Erron no'.$mysql->connect_errno.'<br>';
		echo 'Your Error'.$mysql->connect_error.'<br>';
		exit;
		}

		return $result;

	}
function display_logo($media_path){
	global $mysql;
	$sql = "SELECT * FROM site_settings";
	$result = $mysql->query($sql);

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
		echo  '<img src="'.$media_path.'/'.$site_logo.'" alt="" width="200" height="100">';

	} 
}


	// Show reply of a comment
	function display_comments($comment_parent, $level,$post_id) 
	{
		global $mysql;

		$sql = "SELECT a.comment_id, a.user_id, a.post_id, a.name, a.comment, a.comment_parent, Deriv1.Count FROM `comments` a  LEFT OUTER JOIN (SELECT comment_parent, COUNT(*) AS Count FROM `comments` GROUP BY comment_parent) Deriv1 ON a.comment_id = Deriv1.comment_parent WHERE a.comment_parent= $comment_parent AND a.post_id=" .$post_id;


		$result = $mysql->query($sql);

		// var_dump($result);
		// die();

		echo "<ul>";
		while ($row = $result->fetch_assoc()) 
		{
			if ($row['Count'] > 0) 
			{
				echo "<li>".'<img src="'.'uploads/pp/john.jpg'.'" width="64px" height="64px" class="img-responsive pull-left">'."
				<p class='comment-name'>". $row['name']."</p>
                <p>".$row['comment']."</p>
                <a href='viewpost.php?post_id=".$post_id."&reply_comment_id=".$row['comment_id']."#post-reply'>Reply</a>";
				display_comments($row['comment_id'], $level + 1, $post_id);
				echo "</li>";
			} 
			elseif ($row['Count']==0) 
			{
				echo "<li>".'<img src="'.'uploads/pp/pp_default.png'.'" width="64px" height="64px" class="img-responsive pull-left">'."<p class='comment-name'>". $row['name']. "</p>
				<p>".$row['comment']."</p>
				<a href='viewpost.php?post_id=".$post_id."&reply_comment_id=".$row['comment_id']."#post-reply'>Reply</a>";
				echo"</li>";
			} else;
		}
		echo "</ul>";
	}

	// for upload media path 
	$media_path='http://'.$_SERVER['SERVER_NAME'].'/Incubator/php_oop_iblog_final_class(edited)'.'/uploads';
	// site home page url
	$site_url = 'http://'.$_SERVER['SERVER_NAME'].'/Incubator/php_oop_iblog_final_class(edited)';