<div class="heading">
<ol class="breadcrumb">
  <li><a href="<?=site_url("dashboard")?>">Dashboard</a></li> 
<li><a href="<?=site_url("department")?>">Department</a></li>
</ol>
</div>


<div class="col-lg-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
        
            <input type="text" name="id" ng-model="x.deal_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Deal Title</label>
                <input ng-model="x.name" name="name" class="form-control"  placeholder="Enter Deal Title" required>
              </div>
            </div>
            <div class="col-lg-12">
            <div class="col-lg-9">
                <label style="padding: 7px">Select File</label>
                <input type="file" ng-model="x.newimage" name="image">
                <input ng-model="x.image" name="old_image" hidden>
                <p class="help-block" style="font-size: 12px">Select any file to view on your page.</p>
            </div>
            <div class="col-lg-3" ng-show="x.image">
                <img ng-src="<?=base_url("assets/website/uploads/hotdeal/thumb")?>/{{x.image}}" class="img-responsive" style="height:100px">
             </div>
         </div>
          
            <div class="clearfix"></div>
          
            <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description <i> (Optional)</i></label>
                    <summernote config="options" ng-model="x.description"></summernote>
                   <textarea name="description" ng-model="x.description" hidden></textarea>
                  </div>
            </div>
            <div class="clearfix"></div>
            
            <div id="result" class="pull-left"></div>
            <div class="pull-right"> 
            <div id="webprogress" style="display: none">
                <img src="<?=base_url("assets/website/images/progress/load1.gif")?>">
            </div>
               <button type="submit" id="submitbtn" class="btn btn-info" ng-disabled="form1.$invalid" ng-click="save_data(x)">Save</button>
               <a class="btn btn-default" ng-click="filter_new()">Clear</a> 
            </div>
        </form>
    </div>
    <?php 
    include 'data.php';
    ?>
</div>