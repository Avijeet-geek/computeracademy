<?php $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>


<script src="https://apis.google.com/js/platform.js" async defer></script>
<link rel="canonical" href="<?=$url?>" />


		<div class="row" style="background:#f9f9f9">
			<div class="container">
				<div class="row">
					<div class="container" style="margin: 14% 0%;">
						<div class="col-md-12 col-sm-12">
							<h2 class="single_courcse_title" ><?=$ctitle?></h2> 
							<div style="padding: 2% 5%">
                				<?php if ($type=="I"){?>
                				<img class="img-resonsive" src="<?=$file;?>"
                									alt="<?=$ctitle?>" title="<?=$ctitle?>" />
                				<?php } elseif ($type=="F"){?>
                				<a href="<?=$file?>" class="btn btn-info">Download file</a>
                				<?php }?>
                			</div><br>
<div class="col-md-12" style="margin: -15px">Posted On: <?=$posted_date?><br><br></div>
							<a><i>Share this News On :</i></a>

							<div class="fb-share-button" data-href="<?=$url?>"
								data-layout="box_count"></div>

							&nbsp;
							<g:plus action="share"></g:plus>
							<br> <a class="twitter-share-button"
								href="<?=$url?>?text=<?=$this->school_name?> | News"
								data-size="default">Tweet</a> <br>
							<br>
							<p><?=$content?></p>
						</div>
					</div>
					<br><br>
				</div>
			</div>
		</div>

