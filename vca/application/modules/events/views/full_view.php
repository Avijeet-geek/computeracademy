		<?php $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
							
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>


                                      
<script src="https://apis.google.com/js/platform.js" async defer></script> 
 <link rel="canonical" href="<?=$url?>" />
 
 
	<div class="courses_area courses_padding">
		<div class="container">
	 
			<div class="row">
 		<div class="container">
			<div class="row">
				<div class="container">
				<div class="col-md-12 col-sm-12"> 
				 
				<h2 class="single_courcse_title"><?php echo $ctitle?></h2>
				
				
					<div class="">
				<?php if ($type=="I"){?>
				<img class="img-resonsive" src="<?=$file;?>" alt="<?php echo $ctitle?>" title="<?php echo $ctitle?>"/>
				<?php } elseif ($type=="F"){?>
				<a href="<?=$file?>" class="btn btn-info">Download file</a>
				<?php }?>
			</div>
			
			<a><i>Share this News On :</i></a>
		   	
		   	<div class="fb-share-button" data-href="<?=$url?>" data-layout="box_count"></div>
		    
		   	 &nbsp;	 <g:plus action="share"></g:plus>
		   	 <br>
		   	  <a class="twitter-share-button" href="<?=$url?>?text=<?=$this->school_name?> | News" data-size="default">Tweet</a>
                   <br><br>
				
						 	<p><?php echo $content?></p>
		 
					 
							</div>						
								
								  
					 </div></div></div></div>
				
			</div>
		</div>
	</div>	