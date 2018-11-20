<script type="text/javascript">
jQuery(function(){
	jQuery('#submitbtn2').click(function(){
		jQuery.ajax({
			type: "POST",
			url: "<?php echo site_url('newsletter/add')?>",
			data: jQuery("#newsform").serialize(),
			beforeSend: function(){
				jQuery('#result2').html('<img src="<?php echo base_url()?>assets/ajax-loaders/ajax-loader-4.gif" /> <font color="red">Submitting your informations... Please Wait...</font>');
			},
			success: function(data){
				jQuery('#result2').empty();
				jQuery('#result2').html(data);
				
			}
		});
	});
	});
</script>


<div class="footer-title">
	<h2>Subsribe Newsletters</h2>
	<div>
		<form class="newsletter-form" name="newsform" action="#" id="newsform" method="post" onsubmit="return false;" novalidate>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required="" />
			</div>
			<div class="form-group">
				<span id="result2"></span>
				    <button type="submit" id="submitbtn2"
					class="theme-btn btn-style-one">Subscribe</button>
			</div>
		</form>
	</div>
</div>