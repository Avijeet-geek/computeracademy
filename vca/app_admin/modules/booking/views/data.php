
    <div class="col-sm-12 table_horizontal">
		<div class="input-group custom">
            <div class="input-group-addon info"><span class="glyphicon glyphicon-search"></span></div>
    	     <input type="text"  ng-model="search_text" placeholder="Search here...">
    	</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th class="text-center">Package Name</th>
						<th class="text-center">Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone</th>
						<th class="text-center">Pick Up Date</th>
						<th class="text-center">Drop Off Date</th>
						<th class="text-center">Adults</th>
						<th class="text-center">Children</th>
						<th class="text-center">Account No</th>
						<th class="text-center">IFSC Code</th>
						<th class="text-center">Message</th>
						<th class="text-center">Booking Date</th>
						
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 5" >
						<td>{{x.package_name}}</td>
						<td>{{x.name}}</td>
						<td>{{x.email}}</td>
						<td>{{x.phone}}</td>
						<td>{{x.pickup_date}}</td>
						<td>{{x.dropoff_date}}</td>
						<td>{{x.adults}}</td>
						<td>{{x.children}}</td>
						<td>{{x.account_no}}</td>
						<td>{{x.ifsc_code}}</td>
						<td>{{x.message}}</td>
						<td>{{x.timestamp}}</td>
						
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('template/pagination')?>"></dir-pagination-controls>
        </div>
</div>
   
