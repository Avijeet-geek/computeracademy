 <div class="col-sm-14">
    <div class="table_horizontal">
		<div class="input-group custom_addon">
            <div class="input-group-addon"  style="box-shadow:none; -webkit-box-shadow:none;"><i class="fa fa-search"></i></div>
				<input type="text" ng-model="search_text" placeholder="Search here...">
			</div>
		</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
					   
						<th class="text-center">Name</th>
						<th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Message</th>
						
					</tr>
				</thead>
				<tbody>
				<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 10" pagination-id="contact">
				        <td class="text-center">{{y.name}}</td>
				        <td class="text-center">{{y.phone}}</td>
				        <td class="text-center">{{y.email}}</td>
				        <td class="text-center">{{y.message}}</td>
 					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true"pagination-id="contact" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
   </div>