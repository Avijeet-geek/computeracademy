<div class="col-sm-6">
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
					
					      <th class="text-center">Services</th>
						<th class="text-center">Title</th>
						<th class="text-center">Description</th>
						<th class="text-center" style="width:85px">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="y in datadb | filter: search_text | itemsPerPage: 5" >	
						<td>{{y.sname}}</td>
						<td>{{y.title}}</td>
						<td>{{y.desc}}</td>		
						<td>
						  <a href="javascript:void(0)" ng-click="update(y)">
    						<span class="fa fa-pencil fa-2x"></span></a>
    						&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" ng-click="delete_data(y.id)">
    						<span class="fa fa-trash"></span></a>               
						</td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="app/pagination"></dir-pagination-controls>
        </div>
   </div>