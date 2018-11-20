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
                        <th class="text-center">City</th>
                        <th class="text-center">Address</th>
                         <th class="text-center">Doc</th>
						
					</tr>
				</thead>
				<tbody>
				<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 10" pagination-id="contact">
				        <td class="text-center">{{y.name}}</td>
				        <td class="text-center">{{y.phone}}</td>
				        <td class="text-center">{{y.email}}</td>
				        <td class="text-center">{{y.city}}</td>
				        <td class="text-center">{{y.address}}</td>
 					    <td class="text-center"><span ng-if="y.image" >
     					    <a href="<?=base_url()?>assets/uploads/career/{{y.image}}" target="_blank">
     					       <small>view</small>
     					    </a></span>
     					    <img ng-if="!y.image" src="<?=base_url()?>assets/images/no-img.png"style="height: 50px">
 					    </td>
 					
 					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true"pagination-id="career" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
   </div>