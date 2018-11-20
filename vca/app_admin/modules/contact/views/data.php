
    <div class="col-sm-12 table_horizontal">
		<div class="input-group custom">
            <div class="input-group-addon info"><span class="glyphicon glyphicon-search"></span></div>
    	     <input type="text"  ng-model="search_text" placeholder="Search here...">
    	</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th class="text-center">Name</th>
						<th class="text-center">Last Name</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phone</th>
						<th class="text-center">Message</th>
						<th class="text-center">Date & Time</th>
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 5" >
						<td>{{x.name_contact}}</td>
						<td>{{x.lastname_contact}}</td>
						<td>{{x.email_contact}}</td>
						<td>{{x.phone_contact}}</td>
						<td>{{x.message_contact}}</td>
						<td>{{x.time}}</td>
						
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('template/pagination')?>"></dir-pagination-controls>
        </div>
</div>
   
