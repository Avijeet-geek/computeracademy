<div class="heading">
<ol class="breadcrumb">
  <li><a href="#/dashboard">Dashboard</a></li> 
<li><a href="#/doctor">Timetable</a></li>
</ol>
</div>


<div class="col-lg-12 well" style="padding: 10px 10px 20px 10px">
     <div class="col-sm-6">
         <form name="form1" id="form1" ng-submit="save_data(x)">
        
            <input type="text" name="id" ng-model="x.timetable_id" hidden>
            <div id="validation"></div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Doctor Name </label>
                 <select ng-model="x.doctor_id" name="doctor_id" class="form-control" ng-change="fetch_department(x.doctor_id)" required>
                    <option ng-repeat="e in doctor" value="{{e.doctor_id}}">{{e.name}}</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Department </label>
                <input ng-model="x.department" name="department" class="form-control"  readonly>
                <input ng-model="x.doctor_name" name="doctor_name" hidden>
              </div>
            </div>
                
                
                
           <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Day </label>
                <select ng-model="x.day" name="day" class="form-control" required>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                    <option>Saturday</option>
                    <option>Sunday</option>
                   
                    
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Arrival Time</label>
                <input type="text"  ng-model="x.arrival_time" name="arrival_time" class="form-control" placeholder="Arrival Time" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Departure Time</label>
                <input type="text"  ng-model="x.departure_time" name="departure_time" class="form-control" placeholder="Departure Time" required>
              </div>
            </div>
            
          
            
          
            
            
		
            <div class="clearfix"></div>
          
            <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Chamber Address</label>
                    <summernote config="options" ng-model="x.description"></summernote>
                   <textarea name="description" ng-model="x.description" hidden></textarea>
                  </div>
                  <br>
            </div>
            <div class="clearfix"></div>
            
            <div id="result" class="pull-left"></div>
            <div class="pull-right"> 
            <div id="webprogress" style="display: none">
                <img src="<?=base_url("assets/images/progress/load1.gif")?>">
            </div>
               <button type="submit" id="submitbtn" class="btn btn-info" ng-disabled="form1.$invalid" accesskey="s" ><u><b>S</b></u>ave</button>
               <a class="btn btn-default" ng-click="filter_new()" accesskey="c"><b><u>C</b></u>lear</a> 
               
            </div>
        </form>
    </div>
    <?php 
    include 'data.php';
    ?>
</div>