<style>
.newsBack {
	background: url("<?php echo base_url('assets')?>/images/news.jpg");
	background-size: cover;
	height: 285px;
	width: 100%;
	padding: 0;
	margin: 0% 0% 4% 0%;
}

/* .newsBack:before { */
/* 	content: ''; */
/* 	position: absolute; */
/* 	top: 0; */
/* 	right: 0; */
/* 	bottom: 0; */
/* 	left: 0; */
/* 	background-image: linear-gradient(to bottom right,#da251e,#271470); */
/* 	opacity: .6; */
/* } */

.newsBack h1 {
	padding: 170px 0px 56px 0px;
	text-align: center;
	color: #da251e;
	font-size: 50px;
	font-weight: 900 !important;
	font-style: oblique;
}

.mainbody {
	margin: 2% 0%;
	padding: 2% 0%;
	border: 1px solid #f3dacbe0;
	border-radius: 2px;
	transition: all 0.3s ease;
}

.mainbody:hover {
	box-shadow: 1px 1px 1px 1px #888888;
	transition: all 0.3s ease;
}

.mainbody h3>a {
	color: #c3b125
}
</style>

<div class="newsBack">
	
		<div>
			<h1>News & Events List</h1>
		</div>
	
</div>
<div class="container">
    <?php
        foreach ( $query->result () as $nrow ) {
        		$link = site_url ('news') . "/read/$nrow->auto_id";
        	?>
    <div class="col-md-12 mainbody">
		<div class="col-md-3 ">
            <?php if ($nrow->type=="I"){?>
                <img class="img-fullwidth"
				style="max-height: 150px; max-width: max-content;"
				src="<?=$this->bios_path."assets/website_uploads/news/images/thumb/$nrow->news_thumb"?>"
				alt="<?=$nrow->news_title?>" title="<?=$nrow->news_title?>">
              	<?php }else {?>
    			      <img class="img-responsive" style="max-height: 150px;"
				src="<?=$this->bios_path."assets/website_uploads/school_logo/$web_school_logo"?>"
				alt="<?=$school_name?> News" />
    		<?php }?>
        
        
        </div>
		<div class="col-md-9">
			<h3 class="text-uppercase ">
				<a href="<?=$link?>"><?=$nrow->news_title?></a> <span class="badge"><?=$nrow->posted_date?></span>
			</h3>
			<p><?=word_limiter(strip_tags($nrow->news),30)?><a href="<?=$link?>"></a>
			</p>
			<div class="text-right">
				<a href="<?=$link?>" class="btn btn-default btn-md">Details</a>
			</div>

		</div>

	</div>
     <?php }?>
        <div class="text-center">
    		<?=$this->pagination->create_links ()?>
    	</div>

</div>



