
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
						<th class="text-center">Doctor Email</th>
						<th class="text-center">Appointment Date</th>
						<th class="text-center">Appointment Day</th>
						<th class="text-center">Chamber Address</th>
						<th class="text-center">Patient Name</th>
						<th class="text-center">Patient Email</th>
						<th class="text-center">Patient Phone No</th>
						
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 5" >
						<td>{{x.doctor_name}}</td>
						<td>{{x.doctor_email}}</td>
						<td>{{x.appointment_date}}</td>
						<td>{{x.day}}</td>
						<td>{{x.chamber_address}}</td>
						<td>{{x.patient_name}}</td>
						<td>{{x.patient_email}}</td>
						<td>{{x.patient_phone}}</td>
						
						
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('template/pagination')?>"></dir-pagination-controls>
        </div>
</div>
   
