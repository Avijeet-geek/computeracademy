<div class="col-sm-6">
    <div class="col-sm-12 table_horizontal">
		<div class="input-group  custom_addon">
            <div class="input-group-addon"><i class="fa fa-search"></i></div>
				<input type="text" ng-model="search_text" placeholder="Search here...">
			</div>
		</div>
		<div class="table-data">
			<table class="table table-hover">
				<thead>
					<tr class="active">
						<th class="text-center">Title</th>
						<th class="text-center">Content</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="x in datadb | filter: search_text | itemsPerPage: 5" >
						<td>{{x.title}}</td>
						<td>{{htmlToPlaintext(x.content)}}</td>
						<td>
						<button  class="btn btn-info btn-mobile" ng-click="update_call(x)" style="margin-bottom: 5px"><i class="fa fa-pencil"></i></button>
						
						<button class="btn btn-danger btn-mobile" ng-click="delete_data(x)"><i class="fa fa-trash"></i></button></td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('app/pagination')?>"></dir-pagination-controls>
        </div>
   </div>
   
