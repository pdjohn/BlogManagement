<div class="row">
               <form class="form-horizontal" method="post" action="site_update_process.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Site Name</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="site_name" value="<?php echo $site_name; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Logo</label>

                  <div class="col-sm-6">
                    <input type="file" class="form-control" name="site_logo">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Site URL</label>

                  <div class="col-sm-6">
                    <input type="url" class="form-control" name="site_url" value="<?php echo $site_url; ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label"> Admin Email</label>

                  <div class="col-sm-6">
                    <input type="email" class="form-control" name="admin_email" value="<?php echo $admin_email; ?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-6">
                    <textarea name="description" id="" cols="30" rows="10"><?php echo $site_description; ?></textarea>
                  </div> 
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Slogan</label>

                  <div class="col-sm-6">
                    <textarea name="slogan" id="" cols="30" rows="10"><?php echo $site_slogan; ?></textarea>
                  </div> 
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label"> post Per Page</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="post_per_page" value="<?php echo $post_per_page; ?>">
                  </div>
                </div>
                <div class="form-group">
                 <div class="col-sm-5"></div>

                  <div class="col-sm-2">
                    <input type="hidden" name="site_id" value="<?php echo $site_id; ?>">
                    <button type="reset" class="btn btn-default">Cancel</button>
                   <button type="submit" class="btn btn-info pull-right" name="submit">Update</button>
                  </div> 
                </div>
                
              
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
            </div>