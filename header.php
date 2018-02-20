<!DOCTYPE html>
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
</head>

<body>
    <header id="header">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="<?php echo $site_url; ?>"><!-- <img src="img/index/logo.png" alt="logo" class="img-responsive"> -->
                                <?php display_logo($media_path); ?>
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
                        <div class="menubar">
                        <?php include_once 'menu.php'; ?>

                        <!-- <ul class="nav navbar-nav cl-effect-1">
                            <li class="active"><a href="blog-detail.html">Home <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Trend</a></li>
                            <li><a href="#">Menu</a></li>
                            
                            </ul> -->
                        </div>
                        
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