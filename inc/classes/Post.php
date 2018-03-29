<?php 
	include_once 'Database.php';

	class Post extends Database{

		public function blog_author($user_id=0){

				if($user_id ===0){
					return false;
				}

				$sql = "SELECT username FROM users WHERE user_id=$user_id";
				$result = $this->mysql->query($sql);

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

		// show single post content
		public function single_post($post_id=false){

				// global $mysql;

				if($post_id == false)
					return false;
				
				$single_post_sql = "SELECT * FROM posts WHERE post_id=$post_id";

				$single_post_result = $this->mysql->query($single_post_sql);

				if(!$single_post_result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
				}

				return $single_post_result;
			}

		// Query all post
		public function all_post(){

				// global $mysql;
				
				$sql = "SELECT * FROM posts";

				$result = $this->mysql->query($sql);

				if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
				}

				return $result;

			}
		// Limit no of word in excerpt of any page
		public function limit_words($string, $word_limit)
			{
			    $words = explode(" ",$string);
			    return implode(" ", array_splice($words, 0, $word_limit));
			}

		// Show reply of a comment
		public function display_comments($comment_parent, $level,$post_id) 
		{
			//global $mysql;

			$sql = "SELECT a.comment_id, a.user_id, a.post_id, a.name, a.comment, a.comment_parent, Deriv1.Count FROM `comments` a  LEFT OUTER JOIN (SELECT comment_parent, COUNT(*) AS Count FROM `comments` GROUP BY comment_parent) Deriv1 ON a.comment_id = Deriv1.comment_parent WHERE a.comment_parent= $comment_parent AND a.post_id=" .$post_id;


			$result = $this->mysql->query($sql);

			// var_dump($result);
			// die();

			echo "<ul>";
			while ($row = $result->fetch_assoc()) 
			{
				if ($row['Count'] > 0) 
				{
					echo "<li>".'<img src="'.'uploads/pp/pp_default.png'.'" width="64px" height="64px" class="img-responsive pull-left">'."
					<p class='comment-name'>". $row['name']."</p>
	                <p>".$row['comment']."</p>
	                <a href='viewpost.php?post_id=".$post_id."&reply_comment_id=".$row['comment_id']."#post-reply'>Reply</a>";
					$this->display_comments($row['comment_id'], $level + 1, $post_id);
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
	}

 ?>