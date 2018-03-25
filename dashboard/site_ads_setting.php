<?php include_once 'admin_header.php'; ?>
<?php 
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): ?>
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
              <span class="info-box-text">Add Users</span>
              
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
            <h3 class="box-title">Add New User</h3>
          </div>
          <?php if(isset($_SESSION['user_id']))
          $user_id = $_SESSION['user_id'];?>
          <?php $sql = "SELECT username,user_type FROM users WHERE user_id=$user_id"; 
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

              <div class="row">
               <form class="form-horizontal" method="post" action="site_ads_setting_process.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Image Upload</label>

                    <div class="col-sm-6">
                      <input type="file" class="form-control" name="ads_image">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">JS Code</label>

                    <div class="col-sm-6">
                      <textarea name="ads_jscode" id="" cols="30" rows="10" placeholder="JS Code"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Which Add to Show?</label>

                    <div class="col-sm-6">
                     <input type="radio" name="ads_showtype"  value="image"> Image
                     <input type="radio" name="ads_showtype" value='code'> Code
                   </div> 
                 </div>
                 <div class="form-group">
                   <div class="col-sm-5"></div>

                   <div class="col-sm-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Save Ads</button>
                  </div> 
                </div>
                

              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
          </div>

          <?php if(isset($_GET['error'])):?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              Please check your input
            </div>

          <?php endif; ?>


          <?php if(isset($_GET['notification'])):?>
            <?php if($_GET['notification'] == 1):?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Ad Has Been Added Succesfully
              </div>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      <?php else: ?>
        <div style="color:red;font-size: 36px">You Do Not Have Administrative Power!</div>
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

<?php else: ?>
  <?php header('Location:../login.php?error=1') ;?>
<?php endif; ?>