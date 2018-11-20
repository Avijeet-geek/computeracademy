<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Socialmedia</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
          <input name="id" ng-model="x.socialmedia_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Title</label>
            </div>
            <div class="col-sm-10">
                <input name="title" class="form-control" ng-model="x.title" autofocus >
            </div>
            <div class="clearfix"></div>
           
            
            <div class="col-sm-2">
                <label>Select Picture/Image</label>
                url? <input type="checkbox"ng-model="x.url" style="width: 20px;height:20px;border:0px;shadow:none" ng-true-value="'1'" ng-false-value="'0'">
            </div>
            <div class="col-sm-6" ng-if="x.url!='1'">
                <input type="file" name="image">                
                <p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
            </div>
            <div class="col-sm-6" ng-if="x.url=='1'">
                <input name="image_url" class="form-control" placeholder="Enter image URL">
            </div>
            
            <input ng-model="x.image" name="old_image" hidden>
            
            <div class="col-sm-4" ng-show="x.image">
                <img src="<?=base_url("assets/website/uploads/socialmedia/thumb")?>/{{x.image}}" class="img-responsive" style="height:150px">
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-2">
        	     <label>URL</label>
        	</div>
        	<div class="col-sm-10">
        	     
        	       <input name="urlpage" ng-model="x.urlpage" class="form-control">
        	   
        	</div>
            
            <div class="clearfix"></div>
              
         
            <div ng-if="x.socialmedia_id">
                <div class="col-sm-2">
            	     <label>Status</label>
            	</div>
            	<div class="col-sm-2">
            	     <input type="checkbox"ng-model="x.status" style="width: 30px;height:40px;border:0px;shadow:none" ng-true-value="'1'" ng-false-value="'0'">
            	     <input ng-model="x.status" name="status" hidden>
            	</div>
            </div>
            <div class="clearfix"></div>
            
            <div class="col-sm-12"> 
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url()?>/assets/images/progress/load1.gif">
                </div>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(x)" class="btn btn-info" ><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>
  <?php include 'data.php';?>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
   <div class="col-sm-12">
     <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/envelope-open"><i class="fa fa-envelope-open" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-open</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/envelope-open-o"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>envelope-open-o</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/etsy"><i class="fa fa-etsy" aria-hidden="true"></i> <span class="sr-only">Example of </span>etsy</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/free-code-camp"><i class="fa fa-free-code-camp" aria-hidden="true"></i> <span class="sr-only">Example of </span>free-code-camp</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/grav"><i class="fa fa-grav" aria-hidden="true"></i> <span class="sr-only">Example of </span>grav</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/handshake-o"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>handshake-o</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/id-badge"><i class="fa fa-id-badge" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-badge</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/id-card"><i class="fa fa-id-card" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-card</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/id-card-o"><i class="fa fa-id-card-o" aria-hidden="true"></i> <span class="sr-only">Example of </span>id-card-o</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/imdb"><i class="fa fa-imdb" aria-hidden="true"></i> <span class="sr-only">Example of </span>imdb</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/linode"><i class="fa fa-linode" aria-hidden="true"></i> <span class="sr-only">Example of </span>linode</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/meetup"><i class="fa fa-meetup" aria-hidden="true"></i> <span class="sr-only">Example of </span>meetup</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/microchip"><i class="fa fa-microchip" aria-hidden="true"></i> <span class="sr-only">Example of </span>microchip</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/podcast"><i class="fa fa-podcast" aria-hidden="true"></i> <span class="sr-only">Example of </span>podcast</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/quora"><i class="fa fa-quora" aria-hidden="true"></i> <span class="sr-only">Example of </span>quora</a></div>
    
      <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/ravelry"><i class="fa fa-ravelry" aria-hidden="true"></i> <span class="sr-only">Example of </span>ravelry</a></div>
    
   </div>

</div>