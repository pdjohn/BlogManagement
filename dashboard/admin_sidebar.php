  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php if(isset($_SESSION['user_id']))
            $user_id = $_SESSION['user_id'];

          ?>
        <?php $sql = "SELECT username,user_type FROM users WHERE user_id=$user_id";
          // var_dump($sql);
          // die();
          $result = $mysql->query($sql);
          
          if(!$result){
          echo "Somethign wrong in your query\n";
          echo 'Your Erron no'.$mysql->connect_errno.'<br>';
          echo 'Your Error'.$mysql->connect_error.'<br>';
          exit;
          }

          while($user = $result->fetch_assoc()){
            $username = $user['username'];
            $user_type = $user['user_type'];
          }
        ?>
          <p> <?php echo $username ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="../index.php"><i class="fa fa-circle-o text-aqua"></i> <span>Back To Blog</span></a></li>
        
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-circle-o text-red"></i><span>Dashboard</span>
          </a>
        </li>
        <!-- Menu1 -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="users.php"><i class="fa fa-circle-o text-red"></i> <span>All Users</span></a></li>
              <li><a href="add_user.php"><i class="fa fa-circle-o text-yellow"></i> <span>Add User</span></a></li>
              <li><a href="edit_user.php?user_id=<?php echo $_SESSION['user_id'];?>"><i class="fa fa-circle-o text-aqua"></i> <span>Edit Profile</span></a></li>
          </ul>
        </li>
        <!-- Menu2 -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Blog Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="posts.php"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="add_post.php"><i class="fa fa-circle-o"></i> Add New Post</a></li>
          </ul>
        </li>
        <!-- Menu 3 -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="menu.php"><i class="fa fa-circle-o"></i> All Menu</a></li>
            <li><a href="add_menu.php"><i class="fa fa-circle-o"></i> Add New Menu</a></li>
          </ul>
        </li>
        <!-- Menu 4 -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Comment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="comment.php"><i class="fa fa-circle-o"></i> All Comment</a></li>
            <li><a href="add_comment.php"><i class="fa fa-circle-o"></i> Add New Comment</a></li>
          </ul>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Profiles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profiles.php"><i class="fa fa-circle-o"></i> All Profile</a></li>
            <li><a href="add_profile.php"><i class="fa fa-circle-o"></i> All New Profile</a></li>

          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="site_settings.php"><i class="fa fa-circle-o"></i> Site-Info</a></li>
            <li><a href="all_ads.php"><i class="fa fa-circle-o"></i> All Ads</a></li>
            <li><a href="site_ads_setting.php"><i class="fa fa-circle-o"></i> New Ad</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>