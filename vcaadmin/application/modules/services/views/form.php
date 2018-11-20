<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Child Services</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
  <div class="col-sm-6">
      <form name="form1" id="form1">
         <input name="id" ng-model="x.id" hidden>
         <div class="col-sm-2 ">
                <label>Services</label>
            </div>
            <div class="col-sm-10">
            <select class="form-control" name="s_id"  ng-model="x.s_id">
               <option value="">Select Service</option>
               <option ng-repeat="s in services" value="{{s.s_id}}">{{s.name}}</option>
            </select>
            </div>    
            <div class="col-sm-2 ">
                <label>Title</label>
            </div>
            <div class="col-sm-10">
                <input name="title" class="form-control" ng-model="x.title" autofocus required>
            </div>
            <div class="clearfix"></div>
            
             <div class="col-sm-2 ">
                <label>Description</label>
            </div>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control" ng-model="x.desc"></textarea>
            </div>
            <div class="col-sm-12"> 
                <div id="webprogress" style="display: none">
                    <img src="<?=base_url()?>/assets/images/progress/load1.gif">
                </div>
               <button type="submit" id="submitbtn" accesskey="s" ng-click="save(x)" class="btn btn-info" ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
               <a class="btn btn-default" accesskey="c" ng-click="filter_new()"><u><b>C</b></u>lear</a>
               <br><br> 
            </div>
           
            
        </form>
    </div>
     <?php include 'data.php';?>
</div>