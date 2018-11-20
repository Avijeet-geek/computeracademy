<form action="<?php echo site_url('login/changed_password')?>" method="post">

    <div class="container">
    <div class="col-lg-8 col-lg-offset-3">
    <?php if (isset($msg)) echo "<div class='alert alert-danger'>$msg</div>";?>
    <?php if (isset($_GET['msg'])) echo "<div class='alert alert-success'>".$_GET['msg']."</div>";?>
    <br><br>
    <div class="form-group">  
    <label for="text" class="col-lg-3 control-label">Current Password:</label>  
    <div class="col-lg-6">  
      <input class="form-control span10" name="currentpass" id="currentpass" type="password" value="<?php echo set_value('currentpass');?>" placeholder=" Enter Current Password" autofocus> 
    <?php echo form_error('currentpass','<font color="red">','</font>');?>
    </div>  
  </div>  
 
  <div class="clearfix"></div>
   
    <div class="form-group">
    <label for="email" class="col-lg-3 control-label">New Password:</label>
    <div class="col-lg-6">
    <input type="password" class="form-control" name="newpass" placeholder="Enter New Password ">
   <?php echo form_error('newpass','<font color="red">','</font>');?>
    </div>
    </div>
    <div class="clearfix"></div>
  
  
    <div class="form-group">
    <label for="email" class="col-lg-3 control-label">Confirm New Password:</label>
    <div class="col-lg-6">
    <input type="password" class="form-control" name="cmpassword"  placeholder="Confirm Your New Password">
    <p>If the password Contains Capital letters, they must be typed the same way everytime.</p>
   <?php echo form_error('cmpassword','<font color="red">','</font>');?>
    </div>
    </div>
  <br><br><br>
  
  
  
    <div class="col-lg-8 col-lg-offset-3">
    <br><br>
				<button class="btn btn-primary"><i class="fa fa-save" accesskey="s"></i> Change password</button>
				<button class="btn btn-default" accesskey="c"> Cancel</button>  
			
    
    </div>
    </div>
    </div>
  </form>
















