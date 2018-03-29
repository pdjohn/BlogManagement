<?php 
    //include_once 'inc/functions.php' ;
    include_once 'inc/classes/config.php';

$obj_post = new Post();
// getting all posts
$posts=$obj_post->all_post();
// end of getting all posts
$obj_site = new Site();
$logo = $obj_site->display_logo(Site::$media_path);

if(isset($_GET['post_id']) && $_GET['post_id']!=''){
    $singlepost= $obj_post->single_post($_GET['post_id']);
    $post_id = $_GET['post_id'];


//     $sql = "SELECT * FROM site_settings";
//     $result = $mysql->query($sql);
//     if(!$result){
//       echo "Somethign wrong in your query\n";
//       echo 'Your Erron no'.$mysql->connect_errno.'<br>';
//       echo 'Your Error'.$mysql->connect_error.'<br>';
//       exit;
//   }

//   while($logo = $result->fetch_assoc()){
//     $site_logo = $logo['site_logo'];
//     $site_name = $logo['site_name'];
//     $site_url = $logo['site_url'];
//     $admin_email = $logo['site_admin_email'];
//     $description = $logo['site_description'];
//     $slogan = $logo['site_slogan'];
//     $post_per_page = $logo['post_per_page'];

// }

}
else{
    echo "no post found";
    die();
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog site</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <style>
    .blog-detail-comments ul {
        list-style: none;
    }
    .blog-detail-comments ul li {
        padding: 10px 0;
    }
    .blog-detail-comments img {
        margin-right: 10px;
    }
    .media-body li{
        text-decoration: none;
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
 <section id="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php while($post = $singlepost->fetch_assoc()): ?>
                    <div class="blog-detail-post">
                        <div class="blog-details-post-img">
                            <img src="<?php echo Site::$media_path.'/'.$post['post_thumbnail']; ?>" class="img-responsive">
                        </div>
                        <!--end of blog-details-post-img-->
                        <div class="blog-details-post-heading pull-left">
                            <h3><?php echo $post['post_title']; ?></h3>
                        </div>
                        <!--end of blog-details-post-heading -->
                        <div class="blog-details-post-date pull-right">
                            <?php echo date('d',strtotime($post['post_date'])); ?>
                            <span><?php echo date('F',strtotime($post['post_date'])); ?></span>
                        </div>
                        <!--end of blog-details-post-date-->
                        <div class="clearfix"></div>
                        <div class="blog-details-author-tag">
                            <ul class="list-inline">
                                <li><span><i class="fa fa-user" aria-hidden="true"></i></span> <?php echo $obj_post->blog_author($post['user_id']);?></li>
                                <li><span><i class="fa fa-tag" aria-hidden="true"></i></span> Shopping</li>
                            </ul>
                        </div>
                        <!--end of blog-details-author-tag-->
                        <div class="blog-details-text">
                            <p><?php echo $post['post_content']; ?></p>

                            <p><a class="btn btn-default" href="<?php echo $site_url ?>">Go to Home Page</a></p>
                        </div>
                    </div>
                    <!--end of blog-details-author-->
                    <div class="blog-detail-comments">
                        <div class="blog-details-comment-heading">
                            <h4>Comments</h4>
                        </div>
                        <?php
                        $obj_post->display_comments(0, 1,$post_id); ?>
                        <!--end of blog-details-heading-->
                    </div>
                    <!--end of blog-detail-comments-->
                    <div class="blog-details-add-comment" id="post-reply">
                        <div class="blog-details-comment-heading">
                            <h4>Add comment</h4>
                        </div>
                        <!--end of blog-details-comment-heading-->
                        <form  action="add_comment_process.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="Name">
                                    </div>
                                    <!--end of form-group-->
                                </div>
                                <!--end of col-md-6-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Email">
                                    </div>
                                    <!--end of form-group-->
                                </div>
                                <!--end of col-md-6-->
                                <div class="col-md-12">
                                    <textarea class="form-control" name="comment" rows="9" placeholder="Text"></textarea>
                                    <!--end of form-control--> 
                                    <input type="hidden" name="post_id" value="<?php echo $post_id;?>">
                                    <input type="hidden" name="comment_ip" value="<?php echo $SERVER['REMOTE_ADDR'];?>">
                                    <input type="hidden" name="comment_parent" value="<?php echo $_GET['reply_comment_id'];?>">


                                    <div class="blog-form-btn">
                                        <input class="btn" type="submit" id="submit" name="submit">
                                    </div>
                                    <!--end of blog-form-btn-->
                                </div>
                                <!--end of col-md-12-->
                            </div>
                        </form>
                        <!--end of row-->
                    </div>
                    <!--blog-details-add-comment-->
                </div>
            <?php endwhile; ?>
            <!--end of blog-detail-post-->
        </div>
        <!--end of col-md-8-->
        <div class="col-md-4">
            <div class="social-links">
                <h4 class="sidebar-heading">Social Links</h4>
                <ul class="list-inline">
                    <li class="facebook"><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="twitter"><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="google-plus"><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li class="linkedin"><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <!--end of social-links-->
            <div class="instagram">
                <h4 class="sidebar-heading">Instagram</h4>
                <div class="instagram-images">
                    <a href=""><img src="img/index/insta-1.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-2.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-3.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-4.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-5.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-6.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-7.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-8.jpg" alt="instagram"></a>
                    <a href=""><img src="img/index/insta-9.jpg" alt="instagram"></a>
                </div>
                <!--end of instagram-images-->
            </div>
            <!--end of instagram-->
            <div class="clearfix"></div>
            <div class="sidebar-add">
                <p>336 X 280 Add</p>
            </div>
            <!--end of sidebar-add-->
            <div class="sidebar-carousal">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="blog-detail.html">
                                <img src="img/index/sidebar-carousal.jpg" alt="Sidebar Carousal">
                                <div class="carousel-caption">
                                    <h4>Best Life Style Tips </h4>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="blog-detail.html">
                                <img src="img/index/sidebar-carousal.jpg" alt="Sidebar Carousal">
                                <div class="carousel-caption">
                                    <h4>Best Life Style Tips </h4>
                                </div>
                            </a>
                        </div>
                        <div class="item">
                            <a href="blog-detail.html">
                                <img src="img/index/sidebar-carousal.jpg" alt="Sidebar Carousal">
                                <div class="carousel-caption">
                                    <h4>Best Life Style Tips </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!--end of sidebar-carousal-->
            <div class="sidebar-recent-posts widget">
                <h4 class="sidebar-heading">Popular Posts</h4>
                <div class="popular-post-single">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/index/popular-post-1.jpg" alt="Pupular Post">
                            </a>
                        </div>
                        <!--end of media-left-->
                        <div class="media-body">
                            <a href="blog-detail.html"><h5 class="media-heading">Wear That Suits You Best</h5></a> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        </div>
                        <!--end of media-body-->
                    </div>
                    <!--end of media-->
                </div>
                <!--end of popular-post-single-->
                <div class="popular-post-single">
                    <div class="media">
                        <div class="media-left">
                            <a href="blog-detail.html">
                                <img class="media-object" src="img/index/popular-post-2.jpg" alt="Pupular Post">
                            </a>
                        </div>
                        <!--end of media-left-->
                        <div class="media-body">
                            <a href=""><h5 class="media-heading">Colors that are classy</h5></a> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        </div>
                        <!--end of media-body-->
                    </div>
                    <!--end of media-->
                </div>
                <!--end of popular-post-single-->
                <div class="popular-post-single">
                    <div class="media">
                        <div class="media-left">
                            <a href="blog-detail.html">
                                <img class="media-object" src="img/index/popular-post-3.jpg" alt="Pupular Post">
                            </a>
                        </div>
                        <!--end of media-left-->
                        <div class="media-body">
                            <a href=""><h5 class="media-heading">7 quick tips for ladies fashion</h5></a> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        </div>
                        <!--end of media-body-->
                    </div>
                    <!--end of media-->
                </div>
                <!--end of popular-post-single-->
            </div>
            <!--end of sidebar-recent-posts-->
            <div class="sidebar-add-2" style="margin-top: 50px;">
                <p>300 X 600 Add</p>
            </div>
            <!--end of sidebar-add-2-->
        </div>
        <!--end of col-md-4-->
    </div>
    <!--end of row-->
</div>
<!--end of container-->
</section>
<!--end of blog posts section-->
<footer id="footer">
    <div class="footer-overlay">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo">
                            <a href="index.html">
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
                        <div class="footer-quick-links footer-content-list-style ">
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
                                <a href="blog-detail.html">
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
