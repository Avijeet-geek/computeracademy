<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">SubCategory</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1">
         

          <input name="id" ng-model="x.subcat_id" hidden>
    
            <div class="col-sm-2">
                <label>Category</label>
                </div>
                <div class="col-sm-10">
                
                <select ng-model="x.category" name="category" class="form-control">
                    <option value="0">Parent Menu *</option>
                    <option ng-repeat="m in catdb" value="{{m.category_id}}">{{m.name}}</option>
                </select>
            </div>
                        <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Subcategory Name</label>
            </div>
            <div class="col-sm-10">
                <input name="name" class="form-control" ng-model="x.name" autofocus required></div>
            <div class="clearfix"></div>
            <div ng-if="x.subcat_id">
                <div class="col-sm-2">
            	     <label>Status</label>
            	</div>
            	<div class="col-sm-2">
            	     <input type="checkbox"ng-model="x.status" style="width: 30px;height:40px;border:0px;shadow:none" ng-true-value="'1'" ng-false-value="'0'">
            	     <input ng-model="x.status" name="status" hidden>
            	</div>
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