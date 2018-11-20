<div class="heading">
<ol class="breadcrumb">
  <li><a href="#/">Dashboard</a></li> 
<li><a href="javascript:void(0)">Doctor</a></li>
</ol>
</div>


<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1" method="post" action="">
        
            <input name="id" ng-model="x.doctor_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label>Doctor name</label>
                <input ng-model="x.name" name="name" class="form-control" autofocus required>
              </div>
            </div>
            
            <div class="col-lg-6">
				<label>Department</label>
				<div class="form-group">
					<select class="form-control" name="department_id" ng-model="x.department_id">
					    <option ng-repeat="d in department" value="{{d.department_id}}">{{d.name}}</option>
					</select>
				</div>
			</div>
			<div class="col-lg-6">
				<label>Email</label>
				<div class="form-group">
					<input class="form-control" placeholder="Email" name="email" ng-model="x.email">
				</div>
			</div>

			<div class="col-lg-6">
				<label>Phone No</label>
				<div class="form-group">
					<input class="form-control" placeholder="Phone No" name="phone1" ng-model="x.phone1">
				</div>
			</div>

			<div class="col-lg-6">
				<label>Alternative No</label>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Alternative No" name="phone2" ng-model="x.phone2">
					 
				</div>
			</div>
			<div class="col-lg-6">
				<label>Facebook Link</label>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter Facebook Link" name="facebook" ng-model="x.facebook">
					 
				</div>
			</div>
			<div class="col-lg-6">
				<label>Google Plus Link</label>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter Google Plus Link" name="google" ng-model="x.google">
					 
				</div>
			</div>

			<div class="col-lg-12">
				<label>Twitter Link</label>
				<div class="form-group">
					<textarea class="form-control" rows="1" placeholder="Enter Twitter Link" name="twitter" ng-model="x.twitter"></textarea>
				</div>
			</div>

			<div class="col-lg-12">
				<label>Address</label>
				<div class="form-group">
					<textarea class="form-control" rows="1" placeholder="Address" name="address" ng-model="x.address"></textarea>
				</div>
			</div>
            
          <div class="col-lg-12">
               
                    <div class="col-lg-9">
                        <label style="padding: 7px">Select Picture/Image</label>
                        <input type="file" ng-model="x.newimage" name="image">
                        <input ng-model="x.image" name="old_image" hidden>
                        <p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
                    </div>
                    <div class="col-lg-3" ng-show="x.image">
                        <img src="<?=base_url("assets/uploads/doctors/thumb")?>/{{x.image}}" class="img-responsive" style="height:150px">
                     </div>
                 </div>
                 
            <div class="clearfix"></div>
            <div class="col-lg-12">
                  <div class="form-group">
                    <label>Enter Your Page Content Below</i></label>
                    <summernote config="options" ng-model="x.description"></summernote>
                    <textarea name="description" ng-model="x.description" hidden></textarea>
                  </div>
            </div>
            <div class="clearfix"></div>
            
            <div id="result" class="pull-left"></div>
            <br>
            <div class="pull-right"> 
            <div id="webprogress" style="display: none">
                <img src="<?=base_url("assets/images/progress/load1.gif")?>">
            </div>
               <button type="submit" id="submitbtn" accesskey="s" class="btn btn-info" ng-disabled="form1.$invalid" ng-click="save_data(x)"><u><b>S</b></u>ave Doctor</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>ancel</a> 
            </div>
        </form>
    </div>
    <?php 
    include 'data.php';
    ?>
</div>
