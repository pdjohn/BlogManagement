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


<?php if(isset($_GET['user_id']) && $_GET['user_id']!='')
      $user_id = $_GET['user_id'];

   ?>
  <?php $sql = "SELECT * FROM users WHERE user_id=$user_id"; 

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
      $active = $user['active'];
      $email = $user['email'];
    }


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
              <h3 class="box-title">Edit User</h3>
            </div>
         
            
            <!-- /.box-header -->
            <div class="box-body">
          
          
           
            <div class="row">
               <form class="form-horizontal" method="post" action="edit_user_process.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username;?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" placeholder="To change password give pass or leave blank if you dont want to change">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">User Type</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_type" value="<?php echo $user_type?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label"> Active?(1 or 0)</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="active" value="<?php echo $active ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                  </div> 
                </div>
                <div class="form-group">
                 <div class="col-sm-5"></div>
                  <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                  <div class="col-sm-2">
                   <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div> 
                </div>
                
              
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
            </div>

            <!-- alert box -->
            <?php if(isset($_GET['error'])):?>
                    <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                              Please check your input
                    </div>

                  <?php endif; ?>


                  <?php if(isset($_GET['notification'])):?>
                    <?php if(isset($_GET['notification']) && ($_GET['notification'] =='1' || $_GET['notification'] == '2') ):?>
                            <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-check"></i> Alert!</h4>
                               User Has Been Edited Succesfully
                            </div>
                    <?php endif; ?>
                  <?php endif; ?>
           
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