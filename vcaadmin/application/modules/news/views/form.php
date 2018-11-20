<div class="heading">
<ol class="breadcrumb">
  <li><a href="#/">Dashboard</a></li> 
<li><a href="javascript:void(0)">News</a></li>
</ol>
</div>


<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
        
            <input type="text" name="id" ng-model="x.auto_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>News Title</label>
                <input ng-model="x.title" name="title" class="form-control" autofocus placeholder="Enter an News Title" required>
              </div>
            </div>
            
            <div class="clearfix"></div>
          <div class="col-lg-12">
               
                    <div class="col-lg-8">
                        <label style="padding: 7px">Select Picture/Image</label>
                        <input type="file" ng-model="x.newimage" name="image">
                        <input ng-model="x.image" name="old_image" hidden>
                        <p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
                    </div>
                    <div class="col-lg-4" ng-show="x.image">
                        <img src="<?=base_url("assets/uploads/news/thumb")?>/{{x.image}}" class="img-responsive" style="height:150px">
                     </div>
                 </div>
                 
            <div class="clearfix"></div>
            <div class="col-lg-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Enter Your Page Content Below</i></label>
                    <summernote config="options" ng-model="x.content"></summernote>
                    <textarea name="content" ng-model="x.content" hidden></textarea>
                  </div>
            </div>
            <div class="clearfix"></div>
            
            <div id="result" class="pull-left"></div>
            <br>
            <div class="pull-right"> 
            <div id="webprogress" style="display: none">
                <img src="<?=base_url("assets/images/progress/load1.gif")?>">
            </div>
               <button type="submit" id="submitbtn" accesskey="s" class="btn btn-info" ng-disabled="form1.$invalid" ng-click="save_data(x)"><u><b>S</b></u>ave News</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>ancel</a> 
            </div>
        </form>
    </div>
    <?php 
    include 'data.php';
    ?>
</div>