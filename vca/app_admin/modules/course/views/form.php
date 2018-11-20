<div class="heading">
<ol class="breadcrumb">
  <li><a href="<?=site_url("dashboard")?>">Dashboard</a></li> 
<li><a href="<?=site_url("course")?>">Course</a></li>
</ol>
</div>


<div class="col-lg-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
        
            <input type="text" name="id" ng-model="x.c_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Course Name</label>
                <input ng-model="x.course_name" name="course_name" class="form-control"  placeholder="Name" required>
              </div>
            </div>
              <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Course Heading</label>
                <input ng-model="x.course_heading" name="course_heading" class="form-control"  placeholder="Price" required>
              </div>
            </div>
            
          
            <div class="clearfix"></div>
          
            <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Course Description <i> (Optional)</i></label>
                    
                   <textarea class="form-control" name="course_description" ng-model="x.course_description"></textarea>
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