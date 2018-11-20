<br><br><br><br> 			
<div class=" col-sm-4 col-sm-offset-4 ">
    <h2 align="center">Welcome Administrator</h2>
    <br>
    <form class="form-horizontal" action="<?php echo site_url('login/check');?>" method="post">
           <?php $error=validation_errors();
			if(isset($msg))
				echo '<div class="alert alert-danger">'.$msg.'</div>';
			else
			if(!$error)
			    echo '<div class="alert alert-info">Please login with your Username and Password.</div>';
			else echo '<div class="alert alert-warning">'.$error.'</div>';?>
		
		  
          <div class="form-group">  
            <label for="name" class="col-lg-2 control-label">Username:</label>  
            <div class="col-lg-8">  
              <input class="form-control span10" name="username" id="username" type="text" value="<?php echo set_value('username');?>" placeholder="Username"/> 
            </div>  
          </div>  
          <div class="form-group">  
            <label for="email" class="col-lg-2 control-label">Password:</label>  
            <div class="col-lg-8">  
              <input class="form-control span10" name="password" id="password" type="password"  placeholder="Password"/> 
            </div>  
          </div> 
          <p class="col-sm-6 col-sm-offset-3">
              <button type="submit" class="btn btn-info btn-block">Login</button>
          </p>
		</form>			
</div>