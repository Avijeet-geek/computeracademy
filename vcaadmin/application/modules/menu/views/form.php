<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Menu</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
         <input name="id" ng-model="x.menu_id" hidden>
         
         <div class="col-sm-2 ">
                <label>Menu Type</label>
            </div>
            <div class="col-sm-10">
            <select class="form-control" name="type" ng-model="x.type">
               <option value="">Select</option>
               <option value="0">None</option>
               <option value="1">Top Nav</option>
               <option value="2">Menu Bar</option>
               <option value="4">Footer</option>
<!--                <option ng-repeat="s in service_head" value="{{s.servic_head_id}}">{{s.name}}</option> -->
            </select>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Link Type</label>
            </div>
            <div class="col-sm-10">
            <select class="form-control" name="link_type" ng-model="x.link_type">
               <option value="">Select</option>
               <option value="2">None</option>
               <option value="0">Select Page</option>
               <option value="1">External</option>
            </select>
            </div>
            
            <div ng-if="x.link_type=='0'">
                <div class="col-sm-2 ">
                    <label>Select Internal Page</label>
                </div>
               <div class="col-sm-4">
                <select class="form-control" name="page_id" ng-model="x.page_id">
                   <option value="">Select</option>
                   <option ng-repeat="x in pages" value="{{x.page_id}}">{{x.title}}</option>
                </select>
            </div>
            </div>
            <div class="clearfix"></div>
          <div ng-if="x.link_type=='1'"> 
            <div class="col-sm-2 ">
                <label>Enter Url</label>
            </div>
            <div class="col-sm-10">
                <input name="url" class="form-control" ng-model="x.url" autofocus required>
            </div>
            </div> 
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Name</label>
            </div>
            <div class="col-sm-10">
                <input name="name" class="form-control" ng-model="x.name" autofocus required>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-2">
                <label>Order</label>
            </div>
            <div class="col-sm-10">
                <input name="order" class="form-control" ng-model="x.order" autofocus required>
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
    		<div class="col-sm-2" ng-show="x.image">
			<img src="<?=base_url("assets/website/uploads/menu/thumb")?>/{{x.image}}"
				class="img-responsive" style="height: 150px">
		</div>
		<div class="clearfix"></div>
             
             <div class="col-sm-2 ">
                <label>Description</label>
            </div>
            <div class="col-sm-10">
                 <textarea name="description" class="form-control" ng-model="x.description"></textarea>               
            </div>
           
            <div class="clearfix"></div> 
            <div class="col-sm-2 ">
                <label></label>
            </div>          
            <div class="clearfix"></div>
            <div class="col-sm-12"> 
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url()?>/assets/images/progress/load1.gif">
                </div>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save_data(x)" class="btn btn-info"  ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
        </form>
    </div>
  <?php include 'data.php';?>
   

</div>