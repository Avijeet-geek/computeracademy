<div class="heading">
    <ol class="breadcrumb">
      <li><a href="#/">Dashboard</a></li> 
      <li><a href="javascript:void(0)">Users</a></li>
    </ol>
</div>

<div class="col-sm-12 well">
     <div class="col-sm-6">
         <form name="form1" id="form1">
         

          <input name="id" ng-model="x.user_id" hidden>
            
            <div class="col-sm-2 ">
                <label>usertype</label>
            </div>
            <div class="col-sm-10">
                <select name="usertype" class="form-control" ng-model="x.usertype" autofocus required>
                    <option value="">--Select User--</option>
                    <option value="A">Administrator</option>
                    <option value="U">User</option>
                </select>
            </div>
            <div class="clearfix"></div>
            
            <div class="col-sm-2">
                <label>Name</label>
                </div>
                <div class="col-sm-10">
                <input ng-model="x.name" name="name" class="form-control" autofocus placeholder="Please enter Name" >
              
            </div><br>
           
            <div class="col-sm-2">
                <label>username</label>
            </div>
            <div class="col-sm-10">
                <input ng-if="!x.user_id" ng-model="x.username" name="username" class="form-control"  placeholder="Please enter username" >
                <input ng-if="x.user_id" ng-model="x.username" readonly class="form-control" >
            </div><br>
            
            
            <div ng-if="!x.user_id">
            <div class="col-sm-2">
                <label>password</label>
                </div>
                <div class="col-sm-10">
                <input type="password" ng-model="x.password" name="password" class="form-control" autofocus placeholder="Please enter password" >
              
            </div><br>
             <div class="col-sm-2">
                <label> Confirm password</label>
                </div>
                <div class="col-sm-10">
                <input type="password" ng-model="x.cpassword" name="cpassword" class="form-control" autofocus placeholder="Please enter password" >
           </div> 
            </div> 
          <div ng-if="x.user_id">
            <div class="col-sm-2">
                <label>Reset password</label>
                </div>
                <div class="col-sm-10">
                <input type="password" name="password" class="form-control" autofocus placeholder="Please enter password" >
              
            </div><div class="clearfix"></div>
             <div class="col-sm-2">
                <label> Confirm password</label>
                </div>
                <div class="col-sm-10">
                <input type="password" name="cpassword" class="form-control" autofocus placeholder="Please enter password" >
           </div> 
            </div>
            <div class="clearfix"></div>

            <div class="col-sm-2">
                <label>Email</label>
                </div>
                <div class="col-sm-10">
                <div class="input-group ">
                  <span class="input-group-addon" id="basic-addon1">@</span>
                <input ng-model="x.email" type="email" name="email" class="form-control" autofocus placeholder="Please enter Email Address" >
              </div>
              </div>
              <br>
            
          <div class="col-sm-2">
                <label>Phone1</label>
                </div>
                <div class="col-sm-10">
                 <div class="input-group ">
                  <span class="input-group-addon" id="basic-addon1"><b>+91</b></span>
                <input ng-model="x.phone" type="text" name="phone" class="form-control" autofocus placeholder="Please enter Phone No" >
            </div>
            </div>
            <br>
            
         <div class="col-sm-2">
                <label>Phone2</label>
                </div>
                <div class="col-sm-10">
                <input ng-model="x.phone2"type="text" name="phone2" class="form-control" autofocus placeholder="Please enter Phone No" >
        </div><br>

        <div ng-if="x.user_id">
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