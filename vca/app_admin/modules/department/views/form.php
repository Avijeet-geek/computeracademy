<div class="heading">
<ol class="breadcrumb">
  <li><a href="<?=site_url("dashboard")?>">Dashboard</a></li> 
<li><a href="<?=site_url("department")?>">Packages</a></li>
</ol>
</div>


<div class="col-lg-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
        
            <input type="text" name="id" ng-model="x.department_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Package Name</label>
                <input ng-model="x.name" name="name" class="form-control"  placeholder="Name" required>
              </div>
            </div>
            <div class="col-lg-12">
            <div class="col-lg-9">
                <label style="padding: 7px">Select File</label>
                <input type="file" ng-model="x.newimage" name="image">
                <input ng-model="x.image" name="old_image" hidden>
                <p class="help-block" style="font-size: 12px">Select any file to view on your page.</p>
            </div>
            
         </div>
          <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Day</label>
                <input ng-model="x.day" name="day" class="form-control"  placeholder="No of Days" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Night</label>
                <input ng-model="x.night" name="night" class="form-control"  placeholder="Night" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input ng-model="x.price" name="price" class="form-control"  placeholder="Price" required>
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