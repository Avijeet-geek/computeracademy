<div class="heading">
	<ol class="breadcrumb">
		<li><a href="#/">Dashboard</a></li>
		<li><a href="javascript:void(0)">Pages</a></li>
	</ol>
</div>
<style>
.nav-tabs>li>a {
	/* adjust padding for height*/
	padding-top: 20px;
	padding-left: 250px;
	padding-right: 250px;
	padding-bottom: 0px;
}
</style>
<ul class="nav nav-tabs" role="tablist">
	<li role="presentation" class="active"><a data-target="#create"
		aria-controls="create" role="tab" data-toggle="tab" id="create_pg">Create</a></li>
	<li role="presentation"><a data-target="#view" aria-controls="view"
		role="tab" data-toggle="tab">View</a></li>
</ul>


<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="create">
		<div class="col-sm-12 well">

			<form name="form1" id="form1" method="post" action="">

				<input name="id" ng-model="x.page_id" hidden>
				<div class="clearfix"></div>
				<div class="col-sm-2 ">
					<label>Page Type</label>
				</div>
				<div class="col-sm-4">
					<select class="form-control" name="pg_type" ng-model="x.pg_type">
						<option value="">Select</option>
						<option value="0">General Page</option>
						<option value="1">Home</option>
<!-- 						<option value="2">Login</option> -->
<!-- 						<option value="3">Registration</option> -->
						<option value="4">Contact</option>
						<option value="5">Blog</option>
						<option value="6">Career</option>
						<option value="7">Gallery</option>
						
					</select>
				</div>
				<div class="col-sm-6">
					<label class="label label-warning" ng-if="page_url"><a
						href="{{page_url}}" target="_blank">{{page_url}}</a></label>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-2 ">
					<label>Title</label>
				</div>
				<div class="col-sm-10">
					<input name="title" class="form-control" ng-model="x.title">
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-2 ">
					<label>Menu Type</label>
				</div>
				<div class="col-sm-4">
					<select class="form-control" name="menu_type"
						ng-model="x.menu_type" ng-change="fetch_menu(x.menu_type)">
						<option value="">Select</option>
						<option value="0">None</option>
						<option value="1">Top Nav</option>
						<option value="2">Menu Bar</option>
						<option value="3">Sub Menu</option>
						<option value="4">Footer</option>
					</select>
				</div>
				<div ng-if="x.menu_type=='1' || x.menu_type=='4' || x.menu_type=='2'">
					<div class="col-sm-2 ">
						<label>Menu</label>
					</div>
					<div class="col-sm-4">
						<select class="form-control" name="m_id" ng-model="x.m_id">
							<option value="">Select</option>
							<option ng-repeat="m in menus" value="{{m.menu_id}}">{{m.name}}</option>
						</select>
					</div>
				</div>

				<div ng-if="x.menu_type=='3'">
					<div class="col-sm-2 ">
						<label>Service Head</label>
					</div>
					<div class="col-sm-4">
						<select class="form-control" name="m_id" ng-model="x.m_id">
							<option value="">None</option>
							<option ng-repeat="m in menus" value="{{m.s_id}}">{{m.name}}</option>
						</select>
					</div>
				</div>
<!-- 				<div ng-if="x.menu_type=='3'"> -->
<!-- 					<div class="col-sm-2"> -->
<!-- 						<label>Child Menu</label> -->
<!-- 					</div> -->
<!-- 					<div class="col-sm-4"> -->
<!-- 						<select class="form-control" name="m_id" ng-model="x.m_id"> -->
<!-- 							<option value="">None</option> -->
<!-- 							<option ng-repeat="m in menus" value="{{m.id}}">{{m.title}}</option> -->
<!-- 						</select> -->
<!-- 					</div> -->
<!-- 				</div> -->
<!-- 				<div class="clearfix"></div> -->

				<div class="col-sm-12">
					<label>Content</label>
					<summernote config="options" ng-model="x.content"></summernote>
					<textarea name="content" ng-model="x.content" hidden></textarea>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-2">
					<label>Short Description</label>
				</div>
				<div class="col-sm-4">
					<textarea name="description" class="form-control"
						ng-model="x.description"
						style="margin: 0px 1.32813px 0px 0px; width: 870px; height: 83px;"></textarea>
				</div>
				<div class="clearfix"></div>
				
				<div class="col-sm-2">
                <label>Select Slider</label>
                </div>
                <div class="col-sm-4">
                    <select ng-model="x.slider_id" name="slider_id" class="form-control">
                        <option value="00"> None</option>
                        <option ng-repeat="s in sliders" value="{{s.slider_id}}">{{s.title}}</option>
                    </select>
                </div>

				<div class="clearfix"></div>
				<div class="col-sm-2">
					<label>Header Tags</label>
				</div>
				<div class="col-sm-4">
					<textarea name="header" class="form-control" ng-model="x.header"
						style="margin-left: 0px; margin-right: -194.344px; width: 330px;"></textarea>
				</div>
				<div class="col-sm-2">
					<label>Footer Tags</label>
				</div>
				<div class="col-sm-4">
					<textarea name="footer" class="form-control" ng-model="x.footer"
						style="margin-left: 0px; margin-right: -194.344px; width: 335px;"></textarea>
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-2">
					<label>Keywods</label>
				</div>
				<div class="col-sm-4">
					<input name="keywords" class="form-control" ng-model="x.keywords">
				</div>

				<div class="clearfix"></div>
				<div class="col-sm-2">
					<label>Select Image</label> url? <input type="checkbox" ng-model="x.url_type"
						style="width: 20px; height: 20px; border: 0px; shadow: none"
						ng-true-value="'1'" ng-false-value="'0'">
				</div>
				<div class="col-sm-4" ng-if="x.url_type!='1'">
					<input type="file" name="image">
					<p class="help-block" style="font-size: 12px">Select any picture to view on your page.</p>
				</div>
				<div class="col-sm-4" ng-if="x.url_type=='1'">
					<input name="image_url" ng-model="x.image" class="form-control"
						placeholder="Enter image URL">
				</div>

				<input ng-model="x.image" name="old_image" hidden>

				<div class="col-sm-3" ng-show="x.image">
					<img
						src="<?=base_url("assets/website/uploads/page/thumb")?>/{{x.image}}"
						class="img-responsive" style="height: 150px">
				</div>

				<div class="clearfix"></div>
				<div ng-if="x.page_id">
					<div class="col-sm-2">
						<label>Status</label>
					</div>
					<div class="col-sm-2">
						<input type="checkbox" ng-model="x.status"
							style="width: 30px; height: 40px; border: 0px; shadow: none"
							ng-true-value="'1'" ng-false-value="'0'"> <input
							ng-model="x.status" name="status" hidden>
					</div>
				</div>
				<div class="clearfix"></div>
				
                 <div class="col-sm-2 ">
					<label>Enquiry Check </label>
				</div>
				<div class="col-sm-4">
					<select class="form-control" name="eq_check" ng-model="x.eq_check">
						<option value="">Select</option>
						<option value="0">No</option>
						<option value="1">Yes</option>
						
					</select>
				</div>
				
				<div class="clearfix"></div>
				<div class="col-sm-12">
					<div id="webprogress" style="display: none">
						<img src="<?=base_url()?>/assets/images/progress/load1.gif">
					</div>
					<button type="submit" id="submitbtn" accesskey="s"
						ng-click="save_data(x)" class="btn btn-info"
						ng-disabled="form1.$invalid">
						<u><b>S</b></u>ave
					</button>
					<a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
					<br>
					<br>
				</div>
			</form>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane" id="view">
<?php include 'data.php';?>
</div>
</div>
<style>
.note-group-select-from-files {
	display: none;
}
}
</style>