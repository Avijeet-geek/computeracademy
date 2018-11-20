<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Items</a></li>
    </ol>
    <div align="right">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Add Tax
</button>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1">
  Add Filter
</button>
</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Filters</h4>
      </div>
      <div class="modal-body">
       <?php $this->load->view('item_filter/form')?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add tax</h4>
      </div>
      <div class="modal-body">
       <?php $this->load->view('item_tax/form')?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div>
<style>
.nav-tabs > li > a
{
    /* adjust padding for height*/
    padding-top: 20px; 
        padding-left: 250px; 
        padding-right: 250px; 
    padding-bottom: 0px;
}
</style>
 <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a id="newform"data-target="#create" aria-controls="create" role="tab" data-toggle="tab">Add</a></li>
    <li role="presentation"><a data-target="#view2" aria-controls="view2" role="tab" data-toggle="tab">View</a></li>
  </ul>

  
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="create">
<div class="col-sm-12 well">
     
         <form name="form1" id="form1" method="post" action="">
          <input name="id" ng-model="x.item_id" hidden>
            <div class="clearfix"></div>
<div class="col-sm-2 ">
			<label>Type</label>
		</div>
		<div class="col-sm-4">
			<select ng-model="x.type" name="type" class="form-control">
				<option ></option>
				<option value="1">Product</option>
				<option value="2">Service</option>

			</select>
		</div>
		<div class="clearfix"></div>


		<div class="col-sm-2 ">
			<label>Category</label>
		</div>
		<div class="col-sm-4">
			<select ng-model="x.category" name="category" class="form-control">
				<option ></option>
				<option ng-repeat="c in category" value="{{c.category_id}}">{{c.name}}</option>
			</select>
		</div>
		<div class="clearfix"></div>

		<div class="col-sm-2 ">
			<label>Sub Category</label>
		</div>
		<div class="col-sm-4">
			<select ng-model="x.subcategory" name="subcategory"
				class="form-control">
				<option ></option>
				<option ng-repeat="s in subcategory" value="{{s.subcat_id}}">{{s.name}}</option>
			</select>
		</div>
		<div class="clearfix"></div>

		<div class="col-sm-2 ">
			<label>For</label>
		</div>
		<div class="col-sm-4">
			<select ng-model="x.itemfor" name="itemfor" class="form-control">
				<option ></option>
				<option value="1">Display</option>
				<option value="2">Sale</option>

			</select>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-2 ">
			<label>Title</label>
		</div>
		<div class="col-sm-8">
			<input name="title" class="form-control" ng-model="x.title" autofocus>
		</div>
		<div class="clearfix"></div>

		<div class="col-sm-2">
			<label>Short Description</label>
		</div>
		<div class="col-sm-8">
			<summernote config="options" ng-model="x.description"></summernote>
			<textarea name="description" ng-model="x.description" hidden></textarea>
		</div>
		<div class="clearfix"></div>

		<div class="col-sm-2">
			<label>Specification</label>
		</div>
		<div class="col-sm-8">
			<summernote config="options" ng-model="x.specification"></summernote>
			<textarea name="specification" ng-model="x.specification" hidden></textarea>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-12" ng-if="x.itemfor=='2'">
			<div class="col-sm-2">
				<label>Quantity/Stock</label>
			</div>
			<div class="col-sm-2">
				<input name="quantity" ng-model="x.quantity" class="form-control">
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-2">
			<label>Price</label>
		</div>
		<div class="col-sm-2">
			<input name="price" ng-model="x.price" class="form-control">
		</div>
		<div class="col-sm-1">
			<label>Tax</label>
		</div>
		<div class="col-sm-2">
		<select ng-model="x.tax" name="tax[]" class="form-control" multiple>
				<option ></option>
				<option ng-repeat="t in tax" value="{{t.item_tax_id}}" >{{t.tax_name}}</option>
			</select>
			</div>
			<div class="col-sm-1">
			<label>Filters</label>
		</div>
		<div class="col-sm-2">
		<select ng-model="x.filter" name="filter[]" class="form-control" multiple>
				<option ></option>
				<option ng-repeat="o in filter" value="{{o.filter_id}}" >{{o.name}}</option>
			</select>
			</div>
					<div class="clearfix"></div>
		<div class="col-sm-2">
			<label>Discount</label> <input type="checkbox" ng-model="x.check"
				ng-true-value="'1'" ng-false-value="'0'">
		</div>
		<div class="col-sm-2" ng-if="x.check=='1'">
			<input name="discount"  ng-model="x.discount" class="form-control">
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-2 ">
			<label>Currency</label>
		</div>
		<div class="col-sm-4">
			<select ng-model="x.currency" name="currency" class="form-control">
				<option ></option>
				<option value="INR">INR</option>
			</select>
		</div>
		<div class="clearfix"></div>
            
		<div class="col-sm-2">
			<label>Select Image</label> url? <input type="checkbox"
				ng-model="x.url"
				style="width: 20px; height: 20px; border: 0px; shadow: none"
				ng-true-value="'1'" ng-false-value="'0'">
		</div>
		<div class="col-sm-4" ng-if="x.url!='1'">
			<input type="file" name="image">
			<p class="help-block" style="font-size: 12px">Select any picture to
				view on your page.</p>
		</div>
		<div class="col-sm-4" ng-if="x.url=='1'">
			<input name="image_url" class="form-control"
				placeholder="Enter image URL">
		</div>

		<input ng-model="x.image" name="old_image" hidden>

		<div class="col-sm-3" ng-show="x.image">
			<img
				src="<?=base_url("assets/website/uploads/items/thumb")?>/{{x.image}}"
				class="img-responsive" style="height: 150px">
		</div>

		<div class="clearfix"></div>

           
           
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
</div>
 <div role="tabpanel" class="tab-pane active" id="view2">
<?php include 'data.php';?>
</div>
</div>