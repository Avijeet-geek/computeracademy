<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Menu</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1">
         <input name="id" ng-model="x.p_id" hidden>
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Child Services</label>
            </div>
            <div class="col-sm-10">
            <select class="form-control" name="c_id" ng-model="x.c_id">
               <option value="">Select</option>
               <option ng-repeat="s in services" value="{{s.id}}">{{s.title}}</option>
            </select>
            </div>         
         
            <div class="clearfix"></div>
            <div class="col-sm-2 ">
                <label>Plan Name</label>
            </div>
            <div class="col-sm-10">
                <input name="name" class="form-control" ng-model="x.plan" autofocus required>
            </div>
            <div class="clearfix"></div>
             <div class="col-sm-2 ">
                <label>Price</label>
            </div>
            <div class="col-sm-10">
                <input name="price" class="form-control" ng-model="x.price" autofocus required>               
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