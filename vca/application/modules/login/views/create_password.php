<?php if (!$this->session->userdata('is_logged_in')):?> 
<div class="col-md-12 borderimg" style=" color:#000000; padding:0px 40px">   
<div class="container">
	<div class="row">
	  
        <div class="col-md-offset-3 col-md-6">
             <img class="profile-img" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Circle-icons-unlocked.svg/1024px-Circle-icons-unlocked.svg.png"    alt="">
            <div class="form-login">
          <?php 
          if (@$_GET['err']=="Otp")
          {
              $_SESSION['ng-otp']="";
              echo "<div class='alert alert-danger'>OTP Validation Failed. Please try again and enter correct OTP</div>";
          }
          ?>
       		  <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Set Password</a></li> 
              </ul>
               
            <div id="myTabContent" class="tab-content"><br>
            
      <!-- //////////////////////        LOGIN START             //////////////////////// -->
         
             <form class="form-horizontal" id="create_password"  method="post" onsubmit="return false">
             
             <input type="hidden" value="<?php echo $this->depend['school_id']?>" name="school_id">
             <input type="hidden" value="<?php echo $this->depend['branch_id']?>" name="branch_id"> 
               
                   <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">
                       <div class="input-group">
                            <span class="input-group-addon info"><span class="glyphicon  glyphicon-lock"></span></span>
                            <input name="password" id="password" type="password"  placeholder="Password"   class="form-control" placeholder="Username">
                        </div>
                     </div> 
                    </div>
                     
                    
                    <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">
                        <div class="input-group">
                            <span class="input-group-addon info"><span class="glyphicon  glyphicon-lock"></span></span>
                            <input name="confirm_password"  type="password"  placeholder="Confirm Password"   class="form-control" >
                        </div>
                     </div> 
                    </div>
                     
                 
                  <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">   
                        <div class="progress-outer">
                <div class="progress">
                    <div class="progress-bar progress-bar-info progress-bar-striped active" style="width:80%; box-shadow:-1px 10px 10px rgba(91, 192, 222, 0.7);"></div>
                    <div class="progress-value">80%</div>
                </div>
            </div>
           </div>
          </div>
                     
                    <div class="clearfix"></div>
                    <div class="col-md-offset-2 col-md-8">
                    <center><div id="result" align="center"></div></center><br>
                    </div> 
                    <div class="clearfix"></div>
                     
                  <div class="wrapper">
                     <span class="group-btn">     
                      <button type="submit" class="btn btn-info  ">Set Now</button>
                      <button type="reset" class="btn btn-default  ">Clear</button>      
                    </span>
                 </div>
               </form>       
                
                </div>  
            </div>        
        </div>
     </div>  
     <br><br><br><br><br>
	</div>
</div> 

<script>
$(function(){
	$('#create_password').submit(function(){
		$.ajax({
			type: "POST",
			url: "<?=site_url('login/check_new_password')?>",
			data: $("#create_password").serialize(),
			beforeSend: function(){
				$('#result').html('<img src="<?php echo base_url('assets/ajax-loaders/ajax-loader-7.gif')?>" />');
			},
			success: function(data){
				var arr = $.parseJSON(data);
				if(arr.error==1)
    				$('#result').html(arr.msg);
				else
				{
					$('#result').html("<p class='alert alert-success'>Successfully Authenticated...</p>");
					window.location.assign("<?=site_url('login')?>");
				}
			}
		});
});
});	    
 
</script>
 
<style>
  
.progress{
    height: 15px;
    margin: 0;
    overflow: visible;
    border-radius: 50px;
    background: #eaedf3;
    box-shadow: inset 0 10px  10px rgba(244, 245, 250,0.9);
}
.progress .progress-bar{
    border-radius: 50px;
}
.progress .progress-value{
    position: relative;
    left: -155px;
    top: 2px;
    font-size: 10px;
    font-weight: bold;
    color: #fff;
    letter-spacing: 2px;
}
.progress-bar.active{
    animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
}
@-webkit-keyframes animate-positive{
    0% { width: 0%; }
}
@keyframes animate-positive {
    0% { width: 0%; }
}
 
  
.form-login {
       background-color: #ffffff;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 10px;
    border-color: #5ba5af;
    border-width: 5px;
    /* box-shadow: 0 1px 0 #777272; */
    margin-top: 17px;
    margin-bottom: 20px;
    border: solid 2px #5ba5af; text-align:center;
}
.form-login .form-control{max-width:100%; height:36px;}
.form-login h4{border-bottom: solid 1px #cccccc;
    padding-bottom: 10px;
    margin-bottom: 20px}
    
    .profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    margin-top:20px;
}
</style>


<?php endif;?>