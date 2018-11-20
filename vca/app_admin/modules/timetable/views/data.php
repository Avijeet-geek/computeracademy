<div class="col-sm-6">
    <div class="col-sm-12 table_horizontal">
		<div class="input-group custom">
            <div class="input-group-addon info"><span class="glyphicon glyphicon-search"></span></div>
    	     <input type="text"  ng-model="search_text" placeholder="Search here...">
    	</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
					    <th class="text-center">Doctor Name</th>
						<th class="text-center">Department</th>
						<th class="text-center">Day</th>
						<th class="text-center">Arrival Time</th>
						<th class="text-center">Departure Time</th>
						
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 5" >
					    <td>{{x.doctor_name}}</td>
						<td>{{x.department}}</td>
						<td>{{x.day}}</td>
						<td>{{x.arrival_time}}</td>
						<td>{{x.departure_time}}</td>
						
						
					
						<td><a href="javascript:void(0)" ng-click="update_call(x)"><span class="glyphicon glyphicon-pencil"
								aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" ng-click="delete_data(x)"><span
								class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('template/pagination')?>"></dir-pagination-controls>
        </div>
   </div>
   
