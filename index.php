<?php 
// include_once 'inc/classes/Database.php';
//include_once 'inc/functions.php';
include_once 'inc/classes/config.php';

$obj_post = new Post();
// getting all posts
$posts=$obj_post->all_post();
// end of getting all posts
$obj_site = new Site();
$logo = $obj_site->display_logo(Site::$media_path);

// getting site info
$sql = "SELECT * FROM site_settings";
$result = $obj_post->mysql->query($sql);
if (!$result) {
    echo "Something wrong in your query\n";
    echo 'Your Error No' . $mysql->connect_errno . '<br>';
    echo 'Your Error' . $mysql->connect_error . '<br>';
    exit;
}

while ($site = $result->fetch_assoc()) {
    $site_logo = $site['site_logo'];
    $site_name = $site['site_name'];
    // $site_url = $site['site_url'];
    // $admin_email = $site['site_admin_email'];
    // $description = $site['site_description'];
    // $slogan = $site['site_slogan'];
    // $post_per_page = $site['post_per_page'];

}
// end of getting site info\
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $site_name; ?></title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
        li:hover ul {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="<?php $obj_site->$site_url; ?>" alt="logo" class="img-responsive">
                                <?php echo $logo ?>
                            </a>
                        </div>
                        <!--end of logo-->
                    </div>
                    <!--end of col-md-4-->
                    <div class="col-md-8">
                        <div class="header-add pull-right">
                            <p>Add Size 728 X 90</p>
                        </div>
                        <!--end of header-add-->
                    </div>
                    <!--end of col-md-8-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </div>
        <!--end of top-->
        <div class="menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php include_once 'menu.php'; ?>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <!--end of navbar-->
        </div>
        <!--end of menu-->
    </header>
    <!--end of header-->

    <section id="all-posts">
       <!--end of all-post-heading-v3-->
       <div class="container">
        <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';

        $rec_limit = 5;
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'iblog_noon');

        if(! $conn ) {
            die('Could not connect: ' . mysql_error());
        }
        // mysqli_select_db('iblog_noon');

        /* Get total number of records */
       $sql = "SELECT count(post_id) FROM posts ";
         $retval = mysqli_query( $conn,$sql );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysqli_fetch_array($retval, MYSQLI_NUM );
         $rec_count = $row[0];

        if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
        }else {
            $page = 0;
            $offset = 0;
        }

        $left_rec = $rec_count - ($page * $rec_limit);
        $sql = "SELECT post_id, post_title, post_thumbnail, post_content, post_date, user_id ". 
            "FROM posts ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query( $conn, $sql );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
        //while($post = mysqli_fetch_array($retval, MYSQLI_ASSOC)) :
        while ($post = $posts->fetch_assoc()) : ?>
     
     <div class="single-post">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo Site::$media_path . '/' . $post['post_thumbnail']; ?>" class="img-responsive" >
            </div>
            <div class="col-md-6">
                <div class="single-post-text">
                    <h4><a href="viewpost.php?post_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a></h4>
                    <div class="single-post-author-name pull-left">
                        <p><span>Posted by : </span><?php echo $obj_post->blog_author($post['user_id']); ?></p>
                    </div>
                    <div class="single-post-author-date pull-right">
                        <p><span>Date :</span> <?php echo date('d/m/y', strtotime($post['post_date'])); ?> </p>
                    </div>
                    <div class="clearfix"></div>
                    <p class="post-text"><?php echo $obj_post->limit_words($post['post_content'], 50); ?></p>
                    <a href="viewpost.php?post_id=<?php echo $post['post_id']; ?>" class="btn">Read More</a>
                </div>
                <!--end of single-post-text-->
            </div>
            <!--end of col-md-6-->
        </div>  
        <!--end of row-->
    </div>
    <!--end of single-post-->
<?php endwhile; ?>
<?php 
if( $page > 0 ) {
    $last = $page - 2;
    echo "<a href = \"$_PHP_SELF?page = $last\"></a> |";
    echo "<a href = \"$_PHP_SELF?page = $page\"></a>";
}else if( $page == 0 ) {
    echo "<a href = \"$_PHP_SELF?page = $page\"></a>";
}else if( $left_rec < $rec_limit ) {
    $last = $page - 2;
    echo "<a href = \"$_PHP_SELF?page = $last\"></a>";
}
?>
</div>
<!--end of container-->
<div class="all-post-pagination text-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="active"><a href="#">1<span class="sr-only">(current)</span></a>
            </li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </nav>
    <?php
    // $dbhost = 'localhost:3036';
    // $dbuser = 'root';
    // $dbpass = 'rootpassword';

    // $rec_limit = 5;
    // $conn = mysql_connect($dbhost, $dbuser, $dbpass);

    // if(! $conn ) {
    //     die('Could not connect: ' . mysql_error());
    // }
    // mysql_select_db('iblog_noon');

    /* Get total number of records */
    // $sql = "SELECT count(post_id) FROM posts ";
    // $retval = $mysql->query($sql);

    // if(! $retval ) {
    //     die('Could not get data: ' . mysql_error());
    // }
    // $row = $retval->fetch_assoc();
    // $rec_count = $retval->num_rows;

    // if( isset($_GET{'page'} ) ) {
    //     $page = $_GET{'page'} + 1;
    //     $offset = $rec_limit * $page ;
    // }else {
    //     $page = 0;
    //     $offset = 0;
    // }

    // $left_rec = $rec_count - ($page * $rec_limit);
    // $sql = "SELECT * ". 
    // "FROM posts ".
    // "LIMIT $offset, $rec_limit";

    // $retval = $mysql->query($sql);

    // if(! $retval ) {
    //     die('Could not get data: ' . mysql_error());
    // }

    // while($row = $retval->fetch_assoc()) {
    //     echo "EMP ID :{$row['post_id']}  <br> ".
    //     "EMP NAME : {$row['post_title']} <br> ".
    //     "EMP SALARY : {$row['post_content']} <br> ".
    //     "--------------------------------<br>";
    // }

    // if( $page > 0 ) {
    //     $last = $page - 2;
    //     echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
    //     echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
    // }else if( $page == 0 ) {
    //     echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
    // }else if( $left_rec < $rec_limit ) {
    //     $last = $page - 2;
    //     echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
    // }
    ?>
</div>
<!--end of all-post-pagination-->
</section>
<!--end of all-posts section-->

<footer id="footer">
    <div class="footer-overlay">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo">
                            <a href="index-v3.html">
                                <img src="img/index/footer-logo.png" alt="logo">
                            </a>
                        </div>
                        <!--end of footer-logo-->
                        <div class="footer-text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                        </div>
                        <!--end of footer text-->
                        <div class="footer-subscribe">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                            </form>
                        </div>
                        <!--end of footer-subscribe-->
                        <div class="footer-social-icons">
                            <h4>Follow Us</h4>
                            <ul class="list-inline">
                                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <!--end of footer-social-icons-->
                    </div>
                    <!--end of col-md-3-->
                    <div class="col-md-2">
                        <div class="footer-quick-links footer-content-list-style">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="">Home</a></li>
                                <li><a href="">Pages</a></li>
                                <li><a href="">Service</a></li>
                                <li><a href="">Case Studies</a></li>
                                <li><a href="">Gallery</a></li>
                                <li> <a href="">Blog</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                        <!--end of footer-quick-links-->
                    </div>
                    <!--end of col-md-2-->
                    <div class="col-md-2">
                        <div class="footer-catagories footer-content-list-style ">
                            <h4>Catagories</h4>
                            <ul>
                                <li><a href=""> Life style</a></li>
                                <li><a href="">Music</a></li>
                                <li><a href="">trend</a></li>
                                <li><a href="">food</a></li>
                                <li> <a href="">Creative</a></li>
                                <li><a href="">Social Us</a></li>
                                <li><a href="">Technology</a></li>
                            </ul>
                        </div>
                        <!--end of footer-catagories-->
                    </div>
                    <!--end of col-md-2-->
                    <div class="col-md-5">
                        <div class="footer-recent-post">
                            <h4>Recent post</h4>
                            <div class="footer-recent-post-item post-of-week">
                                <a href="">
                                    <div class="footer-recent-post-contents post-of-week-contents">
                                        <img src="img/index/footer-recent-post.jpg" alt="Post of the week" class="img-responsive">
                                        <div class="footer-recent-post-text post-of-week-text">
                                            <p>7 Quick Tips For Ladies Fashion</p>
                                        </div>
                                        <!--end of footer-recent-post-text-->
                                    </div>
                                    <!--end of footer-recent-post-contents-->
                                </a>
                            </div>
                            <!--end of post-of-week-->
                        </div>
                        <!--end of footer-recent-post-->
                    </div>
                    <!--end of col-md-5-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
            <div class="footer-bottom">
                <p>Copyright & All Rights Reserved By Blog Site,Designed by <i> <a href="https://www.themerally.com/">ThemeRally</a></i></p>
            </div>
            <!--end of footer-bottom-->
        </div>
        <!--end of footer-content-->
    </div>
    <!--end of footer-overlay-->
</footer>
<!--end of footer section-->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
