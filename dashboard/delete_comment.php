<?php include_once 'admin_header.php'; ?>
<?php 
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>
<?php include_once 'admin_sidebar.php'; ?>

<?php if(isset($_GET['comment_id']) && $_GET['comment_id']!='')
$comment_id = $_GET['comment_id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="posts.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Posts</span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="add_post.php">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New Post</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="edit_post.php?user_id=<?php echo $_SESSION['user_id'];?>">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Edit Profile</span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <!-- Data Table -->
        <div class="box">
          <div class="box-header">

            <h3>Deleting Comment</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">

           <h2 style="color:red">Are you Sure you want to delete</h2>
           <form method="post" action="delete_comment_process.php">
            <input type="radio" name="delete"  value="yes"> Yes 
            <input type="radio" name="delete" value='no'> No
            <input type="hidden" name="comment_id" value="<?php echo $comment_id;?>">
            <br>
            <input type="submit" value="Delete">
          </form>           
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include_once 'admin_footer.php'; ?>

<?php else: ?>
  <?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>