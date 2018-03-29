<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style>
	
	.menu ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.menu ul li {
		display: block;
		position: relative;
		float: left;
		z-index: 100;
		background-color: #ddd;
	}

	/* This hides the dropdowns */


	.menu li ul { display: none; }

	.menu ul li a {
		display: block;
		padding: 10px;
		text-decoration: none;
		white-space: nowrap;
		color: #333;
		font-size: 16px;
		text-transform: uppercase; 
		margin: 0 10px;
	}
	.menu ul li a:hover{
		text-decoration: none;
	}
	.menu ul li a::before,
	.menu ul li a::after {
		display: inline-block;
		opacity: 0;
		-webkit-transition: -webkit-transform 0.3s, opacity 0.2s;
		-moz-transition: -moz-transform 0.3s, opacity 0.2s;
		transition: transform 0.3s, opacity 0.2s;
	}
	/* Display the dropdown */

	.menu li:hover > ul {
		display: block;
		position: absolute;
	}


	.menu li:hover li { 
		float: none; 
	}

	.menu li ul li { 
		border-top: 0;
		min-width: 150px;
	}

	/* Displays second level dropdowns to the right of the first level dropdown */


	.menu ul ul ul {
		left: 100%;
		top: 0;
	}

	/* Simple clearfix */

	.menu .nav>li>a {
		padding: 0px;
		padding-top: 10px;
		padding-right: 30px;
	}


	ul:after { clear: both; }
</style>
</head>
<body>
	

<?php
include_once 'inc/db.php';
function display_menu($menu_parent, $level) {
global $mysql;

$sql = "SELECT a.menu_id, a.menu_title, a.menu_link, Deriv1.Count FROM `menu` a  LEFT OUTER JOIN (SELECT menu_parent, COUNT(*) AS Count FROM `menu` GROUP BY menu_parent) Deriv1 ON a.menu_id = Deriv1.menu_parent WHERE a.menu_parent=" . $menu_parent;
$result = $mysql->query($sql);

// var_dump($result);
// die();

echo "<ul>";
	while ($row = $result->fetch_assoc()) {
	if ($row['Count'] > 0) {
	echo "<li><a href='" . $row['menu_link'] . "'>" . $row['menu_title'] . "</a>";
	display_menu($row['menu_id'], $level + 1);
	echo "</li>";
	} elseif ($row['Count']==0) {
	echo "<li><a href='" . $row['menu_link'] . "'>" . $row['menu_title'] . "</a></li>";
	} else;
	}
echo "</ul>";
}
 
display_menu(0, 1);
?>

<ul class="nav navbar-nav navbar-right">
    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
</ul>

</body>
</html>