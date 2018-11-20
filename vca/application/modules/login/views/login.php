<?php if (!$this->session->userdata('is_logged_in')):?>
<div class="alert" style="background: rgba(225,225,225,0.35)" id="login">		
    <form class="form-horizontal" id="loginform" action="<?php echo site_url('login/check');?>" method="post" onsubmit="return false"> 
            <h4>Students Login</h4> 
            <div id="result"></div>
            
			<div class="col-xs-12">
                <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>  
                  <input class="form-control" name="username" id="username" type="text" value="<?php echo set_value('username');?>" placeholder="Username"/> 
                </div>
                </div>
              <br>  
              <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>  
                  <input class="form-control" name="password" id="password" type="password"  placeholder="Password"/>
                  <div class="input-group-addon" style="padding:0; background: #5cb85c"><button type="submit" style="background: #5cb85c; color: #ffffff">Login</button></div> 
                </div>
              </div> 
            </div>
		</form>
</div>

<script>
$(function(){
	$('#loginform').submit(function(){
		$.ajax({
			type: "POST",
			url: "<?=site_url('login/check')?>",
			data: $("#loginform").serialize(),
			beforeSend: function(){
				$('#result').html('<img src="<?php echo base_url('assets/ajax-loaders/ajax-loader-7.gif')?>" /> <font color="red">Please Wait...</font>');
			},
			success: function(data){
				var arr = $.parseJSON(data);
				if(arr.error==1)
    				$('#result').html(arr.msg);
				else
					window.location.assign("<?=site_url('home')?>");
			}
		});
});
});	    
</script>
<?php endif;?>