<style>
.nullbackimg{
    background:linear-gradient(to right,#da251e,#271470);
    background-size:cover;
    height: 285px; 
    width: 100%;
    padding: 0;
    margin: 0% 0% 4% 0%;
}
.newsBack{
    background:  url("<?=$this->bios_path."assets/website_uploads/pages/$image"?>") no-repeat fixed center;
    background-size:cover;
     height: 267px; 
    width: 100%;
    padding: 0;
    margin: 0% 0% 4% 0%;
}

.newsBack h1{

    padding: 175px 0px 56px 0px;
    text-align: center;
    color: #fff;
    font-size: 50px;
    font-weight: 900!important;
    font-style: oblique;
}
.pages a{color: #1ba58b !important}
.pages ul li {
    list-style-type: square;
    margin-left: 5%;
}
.pages ol li {
    list-style-type: decimal;
    margin-left: 5%;
}
.newsBack{
    background:linear-gradient(to right,#da251e,#271470);
}


</style>

<div style="background:linear-gradient(#266ea7, #002c39, #266ea7)">
<div id="myDIV" class="newsBack">
        <h1><?=ucfirst($ctitle)?></h1>
</div>
</div>

<div style="padding: 2% 0%; background:f9f9f9">


<div class="container pages" style="min-height: 340px;"> 
    			 <?php
        if ($thumb == "0") :
            ?>
        			<div class="col-lg-10 col-md-offset-1">
        			<?=$page_content?>
        			</div>
        		<?php else:?>
                <div class="col-lg-10 col-md-offset-1" style="margin-bottom: -10%;">
        			<br>
        			<div style="width: 100%;">
                    			<?=$page_content?>
                    </div>
        		</div>
		
        		<?php endif;?>	 
        		
   </div>
</div>

