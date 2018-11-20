<div class="heading">
<ol class="breadcrumb">
  <li><a href="<?=site_url("dashboard")?>">Dashboard</a></li> 
<li><a href="<?=site_url("services")?>">services</a></li>
</ol>
</div>


<div class="col-lg-12 well">
     <div class="col-sm-6" >
         <form name="form1" id="form1" method="post" action="">
        
            <input type="text" name="s_id" ng-model="x.s_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Heading</label>
                <input ng-model="x.hdng" name="hdng" class="form-control"  placeholder="heading" required>
              </div>
            </div>
              <div class="col-lg-12">
              <div class="col-lg-9">
                <label style="padding: 7px">Select Guest thumb</label>
                <input type="file" ng-model="x.thumb" name="thumb">
                <input ng-model="x.thumb" name="old_thumb" hidden>
                <p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
            </div>
            </div>
            <div class="clearfix"></div>
          
            <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description <i> (Optional)</i></label>
                    
                   <textarea class="form-control" name="desc" ng-model="x.desc"></textarea>
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