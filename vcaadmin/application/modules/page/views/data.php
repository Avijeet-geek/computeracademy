<div class="col-sm-12">
	<div class="table_horizontal">
		<div class="input-group custom_addon">
			<div class="input-group-addon"
				style="box-shadow: none; -webkit-box-shadow: none;">
				<i class="fa fa-search"></i>
			</div>
			<input type="text" ng-model="search_text"
				placeholder="Search here...">
		</div>
	</div>
	<div class="table-data">
		<table class="table table-hover">
			<thead>
				<tr class="active">
					<th class="text-center">Page Type</th>
					<th class="text-center">title</th>
					<th class="text-center">image</th>
					<th class="text-center">Status</th>
					<th class="text-center">Menu Type</th>
					<th class="text-center">Short Descriptiont</th>
					<th class="text-center" style="width: 85px">Action</th>
				</tr>
			</thead>
			<tbody>

				<tr
					dir-paginate="y in datadb | filter: search_text | itemsPerPage: 10">
					<td>
						<p ng-if="y.pg_type=='0'">General Page</p>
						<p ng-if="y.pg_type=='1'">Home</p>
						<p ng-if="y.pg_type=='3'">Contact</p>
						<p ng-if="y.pg_type=='6'">Career</p>
						<p ng-if="y.pg_type=='7'">Gallery</p>
						<p ng-if="y.pg_type=='5'">Blog</p>
					</td>

					<td class="text-center">{{y.title}}</td>
					<div class="col-sm-3" ng-show="x.image">
						<td class="img-responsive" >
						<img ng-if="y.image && y.url_type=='0'" ng-src="<?=base_url()?>assets/website/uploads/page/thumb/{{y.image}}" style="height: 50px">
						<img ng-if="y.url_type=='1'" ng-src="{{y.image}}"style="height: 50px">
						<img ng-if="!y.image" src="<?=base_url()?>assets/images/no-img.png"style="height: 50px">
						</td>
					</div>
					<td class="text-center">{{y.status}}</td>


					<td>
						<p ng-if="y.menu_type=='0'">None</p>
						<p ng-if="y.menu_type=='1'">Menu Bar</p>
						<p ng-if="y.menu_type=='2'">Services</p>
						<p ng-if="y.menu_type=='3'">Child Services</p>
						<p ng-if="y.menu_type=='4'">Footer</p>
					</td>
					<td class="text-center">{{y.description}}</td>
					<td class="text-center"><a href="javascript:void(0)"
						ng-click="update_call(y)" data-toggle="modal"
						data-target=".bs-example-modal-sm"> <span
							class="fa fa-pencil fa-2x"></span></a> &nbsp;&nbsp;&nbsp;<a
						href="javascript:void(0)" ng-click="delete_data(y.page_id)"> <span
							class="fa fa-trash"></span></a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-sm-12">
		<dir-pagination-controls boundary-links="true"
			on-page-change="pageChangeHandler(newPageNumber)"
			template-url="app/pagination"></dir-pagination-controls>
	</div>
</div>