<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Services</a></li>
    </ol>
</div>
<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
         <input name="id" ng-model="x.s_id" hidden>
         
          <div class="col-sm-2 ">
                <label>Menu</label>
            </div>
            <div class="col-sm-10">
            <select class="form-control" name="menu_id" ng-model="x.menu_id">
               <option value="">Select</option>
               <option ng-repeat="m in menus" value="{{m.menu_id}}">{{m.name}}</option>
            </select>
            </div>
            <div class="clearfix"></div>
         
            <div class="col-sm-2 ">
                <label>Service Name</label>
            </div>
            <div class="col-sm-10">
                <input name="name" class="form-control" ng-model="x.name" autofocus required>
            </div>
            <div class="clearfix"></div>
    		<div class="col-sm-2">
    			<label>Select Image</label> url? <input type="checkbox" ng-model="x.url_type" style="width: 20px; height: 20px; border: 0px; shadow: none"
    				ng-true-value="'1'" ng-false-value="'0'">
    		</div>
    		<div class="col-sm-4" ng-if="x.url_type!='1'">
    			<input type="file" name="image">
    			<p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
    		</div>
    		<div class="col-sm-4" ng-if="x.url_type=='1'">
    			<input name="image_url" ng-model="x.image" class="form-control" placeholder="Enter image URL">
    		</div>
    
    		<input ng-model="x.image" name="old_image" hidden>
    
    		<div class="col-sm-3" ng-show="x.image">
    			<img
    				src="<?=base_url("assets/website/uploads/service_head/thumb")?>/{{x.image}}"
    				class="img-responsive" style="height: 150px">
    		</div>
		<div class="clearfix"></div>
             <div class="col-sm-2 ">
                <label>Description</label>
            </div>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" ng-model="x.description"></textarea>
            </div>

            <div class="col-sm-12"> 
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url()?>/assets/images/progress/load1.gif">
                </div>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save(x)" class="btn btn-info" ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>
     <?php include 'data.php';?>
</div>