<div class="heading">
<ol class="breadcrumb">
  <li><a href="<?=site_url("dashboard")?>">Dashboard</a></li> 
<li><a href="<?=site_url("exam_manager")?>">Exam Manager</a></li>
</ol>
</div>

<div class="col-md-12" style="background-color: #F8F8F8; padding: 1% 0">
	<div class="col-md-7">
			<div class="col-md-4"><label>Department</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Department name"></div>
		
			<div class="col-md-4"><label>Exam Title</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Exam Title"></div>
			
			<div class="col-md-4"><label>Time ( Mins )</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Time ( Mins )"></div>
		
			<div class="col-md-4"><label>No. Question</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Total No. Question"></div>
		
			<div class="col-md-4"><label>Total Marks</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Total Marks"></div>
			
			<div class="col-md-4"><label>Pass Marks</label></div>
			<div class="col-md-8"><input type="text" class="form-control" placeholder="Pass Marks"></div>
		
			<div class="col-md-4"><label>Description</label></div>
			<div class="col-md-8"><summernote config="options" ng-model="x.remarks"></summernote>
			<textarea id="exam_desc" ng-model="x.remarks" hidden></textarea>
			</div>
		
		<button type="submit" class="btn btn-info" style="float: right; margin-right: 40px">Submit</button>
		<button type="rest" class="btn " style="float: right; margin-right: 20px">Clear</button>


	</div>
	<div class="col-md-5">

		<div class="col-md-12 text-center">
			<div class="col-lg-12 table_horizontal">
			<div class="input-group">
            <div class="input-group-addon"></div>
					<input type="text" placeholder="Search here...">
			</div>
			</div>
			<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th class="text-center">Department Name</th>
						<th class="text-center">Exam Title</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php for ($i=0; $i<=20; $i++){?>
					<tr>
						<td>John</td>
						<td>Doe</td>
						<td><a href="#"><span class="glyphicon glyphicon-pencil"
								aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="#"><span
								class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
					</tr>
					<?php }?>
				</tbody>

			</table>
</div>

		</div>

	</div>




</div>
