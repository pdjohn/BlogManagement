<?php include_once 'admin_header.php'; ?>
<?php 
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
 /*

  user role type :
  0 - no role 
  1 - admin 
  2 - user 
 */ 

 ?>
<?php include_once 'admin_sidebar.php'; ?>
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
          <a href="users.php">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Users</span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          </a>
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <a href="add_user.php">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Add New User</span>
         
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
          <a href="edit_user.php?user_id=<?php echo $_SESSION['user_id'];?>">
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
              <h3 class="box-title">All Posts</h3>
            </div>
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
            <!-- /.box-header -->
            <div class="box-body">
              <?php if($user_type === '1'): ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Post Id</th>
                  <th>Post Title</th>
                  <th>User Id</th>
                  <th>Post Date</th>
                  <th>Post Thumbnail</th>
                  <th>PostContent</th>
                  <th>Edit Post</th>
                  <th>Delete Post</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                  $sql = "SELECT * FROM posts";

                  $result = $mysql->query($sql);

                  if(!$result){
                  echo "Somethign wrong in your query\n";
                  echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                  echo 'Your Error'.$mysql->connect_error.'<br>';
                  exit;
                  }

                  while($post = $result->fetch_assoc()): ?>

                  <tr>
                    <td><?php echo $post['post_id']; ?></td>
                    <td><?php echo $post['post_title']; ?></td>
                    <td><?php echo $post['user_id']; ?></td>
                    <td><?php echo $post['post_date']; ?></td>
                    <td><?php echo $post['post_thumbnail']; ?></td>
                    <td><?php echo $post['post_content']; ?></td>
                    <td><a href="edit_post.php?post_id=<?php echo $post['post_id'] ?>">Edit Post</a></td>
                     <td><a href="delete_post.php?post_id=<?php echo $post['post_id'] ?>">Delete Post</a></td>
                  </tr>

                  <?php endwhile; ?>


                </tbody>
                <tfoot>
                <tr>
                  <th>Post Id</th>
                  <th>Post Title</th>
                  <th>User Id</th>
                  <th>Post Date</th>
                  <th>Post Thumbnail</th>
                  <th>PostContent</th>
                  <th>Edit Post</th>
                  <th>Delete Post</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php else: ?>
                  <div style="color:red;font-size: 36px">YOU ARE NOT OUR CLAN ALEIN WHO HAS ADMIN POWER!</div>
            <?php endif; ?>
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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php else: ?>
<?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>