<div class="heading">
  <ol class="breadcrumb">
    <li><a href="#/">Dashboard</a></li>
    <li><a href="javascript:void(0)">Settings</a></li>
  </ol>
</div>

 <div class="col-sm-12 well">
  <div class="col-sm-6">
    <form name="form1" id="form1" action="" method="post">
      <div class="col-sm-4">
        <label>Passbook Price </label>
      </div>
      <div class="col-sm-8">
        <input ng-model="x.passbook_price" name="passbook_price" class="form-control" autofocus placeholder="Please enter Passbook price">
      </div>
  <div class="clearfix"></div>
 <div class="col-sm-4">
        <label>Minimum Weight   </label>
      </div>
      <div class="col-sm-8">
        <input ng-model="x.min" name="min" class="form-control" autofocus placeholder="Please enter Minimum Weight ">
      </div>
<div class="clearfix"></div>
<div class="col-sm-4">
        <label>Maximum Weight </label>
      </div>
      <div class="col-sm-8">
        <input ng-model="x.max" name="max" class="form-control" autofocus placeholder="Please enter Maximum Weight">
      </div>
<div class="clearfix"></div>

<fieldset>
<legend>SMS</legend>
      <div class="col-sm-4">
        <label>Vehicle Entry</label>
      </div>
     
      <div class="col-sm-8 checkbox">
        <input ng-model="x.sms_vehicle_entry"  ng-true-value="'1'" ng-false-value="'0'"  type="checkbox">
         <input ng-model="x.sms_vehicle_entry" name="sms_vehicle_entry" hidden>
      </div>
<div class="clearfix"></div>

      <div class="col-sm-4">
        <label>Vehicle Exit</label>
      </div>
      <div class="col-sm-8 checkbox">
        <input ng-model="x.sms_vehicle_exit"    type="checkbox" ng-true-value="'1'" ng-false-value="'0'">
         <input ng-model="x.sms_vehicle_exit" name="sms_vehicle_exit"  hidden>
      </div>
      <div class="clearfix"></div>

      <div class="col-sm-4">
        <label>Grade Assign</label>
      </div>
      <div class="col-sm-8 checkbox">
      <div class="input-group ">
          <input ng-model="x.sms_grade_assign"   ng-true-value="'1'" ng-false-value="'0'" type="checkbox">
          <input ng-model="x.sms_grade_assign" name="sms_grade_assign" hidden>
      </div>
      </div>
      
     <div class="clearfix"></div>
      <div class="col-sm-4">
        <label>Supplier Ad</label>
      </div>
      <div class="col-sm-8 checkbox">
        <input ng-model="x.sms_supplier_ad"  ng-true-value="'1'" ng-false-value="'0'"  type="checkbox">
         <input ng-model="x.sms_supplier_ad" name="sms_supplier_ad" hidden>
      </div>
      <div class="clearfix"></div>
      <div class="col-sm-4">
        <label>Supplier Payment</label>
      </div>
      <div class="col-sm-8 checkbox">
        <input ng-model="x.sms_supplier_payment"  ng-true-value="'1'" ng-false-value="'0'" type="checkbox">
         <input ng-model="x.sms_supplier_payment" name="sms_supplier_payment"   hidden>
      </div>

</fieldset>
<br><br>
<div class="clearfix"></div>
      <div class="col-sm-4">
        <label>Logo</label>
      </div>
      <div class="col-sm-8 ">
        <input ng-model="x.logo" type="file" name="logo" class="form-control" autofocus placeholder="Please enter Goods Capacity">
        <input ng-model="x.old_logo" name="old_logo" hidden>
      </div> 
      
      <div class="clearfix"></div>
      <div class="col-sm-12">
      <div class="form-group">
        <label for="exampleInputPassword1">Print Header</i></label>
        <summernote config="options" ng-model="x.print_header"></summernote>
        <textarea name="print_header" ng-model="x.print_header" hidden></textarea>
      </div>
      </div>
      <div class="clearfix"></div>

      <div class="col-sm-12">
        <div id="webprogress" style="display: none">
          <img src="<?=base_url()?>assets/images/progress/load1.gif">
        </div>
        <button type="submit" id="submitbtn" accesskey="s"  ng-click="save_data(x)" class="btn btn-info" ng-disabled="form1.$invalid"><u><b>S</b></u>ave</button>
        <a class="btn btn-default" accesskey="c" ng-click="filter_new()">
          <u><b>C</b></u>lear</a>
        <br><br>
      </div>
    </form>
  </div>
  
 </div>
 <style>
  input[type=checkbox]{
  margin-top:-12px;
    width:35px;
    height:30px;
  }
 </style>