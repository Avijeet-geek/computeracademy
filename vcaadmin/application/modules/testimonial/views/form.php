<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Testimonial</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
          <input name="id" ng-model="x.testimonial_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Title</label>
            </div>
            <div class="col-sm-10">
                <input name="title" class="form-control" ng-model="x.title" autofocus >
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Name</label>
            </div>
            <div class="col-sm-10">
               <input name="name" class="form-control" ng-model="x.name">
            </div>
            <div class="clearfix"></div>
             <div class="col-sm-2 ">
                <label>Description</label>
            </div>
            <div class="col-sm-10">
               <textarea  name="description" class="form-control" ng-model="x.description"  ></textarea>
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
                <img src="<?=base_url("assets/website/uploads/testimonial/thumb")?>/{{x.image}}" class="img-responsive" style="height:150px">
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-2">
        	     <label>Resize</label>
        	</div>
        	<div class="col-sm-2">
        	     <input type="checkbox"ng-model="x.resize" style="width: 30px;height:40px;border:0px;shadow:none" ng-true-value="'1'" ng-false-value="'0'">
        	     <input ng-model="x.resize" name="resize" hidden>
        	     <div ng-if="x.resize=='1'">
        	       <input name="width" placeholder="width">
        	     </div>
        	</div>
            
            <div class="clearfix"></div>
              
         
            <div ng-if="x.testimonial_id">
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
   

</div>