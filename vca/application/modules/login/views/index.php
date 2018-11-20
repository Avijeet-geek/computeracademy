<?php if (!$this->session->userdata('is_logged_in')):?>
<br><br><br><br><br><br><br><br><br>
<div class="container">
	<div class="row">
        <div class="col-md-offset-3 col-md-6">
             
            <div class="form-login">
          <?php 
          if (@$_GET['err']=="Otp")
          {
              $_SESSION['ng-otp']="";
              echo "<div class='alert alert-danger'>OTP Validation Failed. Please try again and enter correct OTP</div>";
          }
          ?>
       		  <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Student Login</a></li>
                <li><a href="#create" data-toggle="tab">New Login</a></li>
              </ul>
               
            <div id="myTabContent" class="tab-content"><br>
            
      <!-- //////////////////////        LOGIN START             //////////////////////// -->
         
               <div class="tab-pane active in" id="login"> 
                <form class="form-horizontal" id="loginform"  method="post" onsubmit="return false">  
                   <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">
                        <div class="input-group">
                            <span class="input-group-addon info"><span class="glyphicon glyphicon-user"></span></span>
                            <input name="username" id="username" type="text"  value="<?php echo set_value('username');?>" class="form-control" placeholder="Username">
                        </div>
                     </div> 
                    </div>
                    
                    <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">
                        <div class="input-group">
                            <span class="input-group-addon info"><span class="glyphicon  glyphicon-lock"></span></span>
                            <input name="password" id="password" type="password"  placeholder="Password"   class="form-control" placeholder="Username">
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
                      <button type="submit" class="btn btn-info  ">Login</button>
                      <button type="reset" class="btn btn-default  ">Clear</button> 
                           
                    </span>
                    
                 </div>
               </form>                
              </div>
              
          <!-- //////////////////////       END LOGIN          //////////////////////// -->        
        
        <div class="tab-pane fade" id="create">
             <form class="form-horizontal" id="newloginform" action="<?php echo site_url('login/check');?>" method="post" onsubmit="return false">  
                    <div class="col-md-offset-2 col-md-8"> 
                     <div class="row form-group">
                        <div class="input-group">
                            <span class="input-group-addon info"><span class="glyphicon glyphicon-user"></span></span>
                            <input name="student_id" id="student_id" type="text" value="<?php echo set_value('student_id');?>" class="form-control" placeholder="Student ID">
                        </div>
                     </div> 
                    </div>
                    
                    <div class="col-md-offset-2 col-md-8" id="otparea" style="display:none"> 
                      <div class="row form-group">
                        <div class="input-group">
                         <span class="input-group-addon info"><span class="glyphicon glyphicon-send"></span></span>
                         <input name="otp" id="otp" type="text"   class="form-control" placeholder="OTP">
                        </div>
                     </div> 
                    </div>
                       
                <div class="clearfix"></div>
                <div class="col-md-offset-2 col-md-8">
                <center><div id="result2" align="center"></div></center><br>
                </div> 
                <div class="clearfix"></div>
                 
              <div class="wrapper">
                 <span class="group-btn">     
                  <button type="submit" class="btn btn-info  ">Login</button>
                  <button type="reset" class="btn btn-default  ">Clear</button>      
                </span>
             </div>
          </form>                
        </div> 
        
           
                </div>  
            </div>        
        </div>
     </div>  
     <br><br><br><br><br>
	</div>
</div> 
<script>
$(function(){
	$('#loginform').submit(function(){
		$.ajax({
			type: "POST",
			url: "<?=site_url('login/check')?>",
			data: $("#loginform").serialize(),
			beforeSend: function(){
				$('#result').html('<img src="<?php echo base_url('assets/ajax-loaders/ajax-loader-4.gif')?>" />');
			},
			success: function(data){
				console.log(data);
				var arr = $.parseJSON(data);
				if(arr.error==1)
    				$('#result').html(arr.msg);
				else
				{
					$('#result').html("<p class='alert alert-success'>Successfully Authenticated...</p>");
					window.location.assign("<?=site_url('student_panel/view')?>");
				}
			}
		});
});
});	    

$(function(){
	$('#newloginform').submit(function(){
		$.ajax({
			type: "POST",
			url: "<?=site_url('login/new_login')?>",
			data: $("#newloginform").serialize(),
			beforeSend: function(){
				$('#result2').html('<img src="<?php echo base_url('assets/ajax-loaders/ajax-loader-4.gif')?>" />');
			},
			success: function(data){
				var arr = $.parseJSON(data);
				if(arr.error==1)
    				$('#result2').html(arr.msg);
				else
				{ 
					$('#result2').html(arr.msg);
					$('#otparea').css('display','block'); 
				}
				if(arr.url){
					window.location.assign(decodeURIComponent(arr.url));
				}
			}
		});
});
});	 
</script>
 
<style>
 
.input-group-addon.info {
    color: rgb(255, 255, 255);
    background-color: #5ba5af;
    border-color: rgb(38, 154, 188);
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