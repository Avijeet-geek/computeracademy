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
						<th class="text-center">Title</th>
						<th class="text-center">description</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
				
					<tr dir-paginate="z in albums | filter: search_text | itemsPerPage: 5" paginate-id="album">
						<td>{{z.title}}</td>
						<td>{{htmlToPlaintext(z.description)}}</td>
						<td><a href="javascript:void(0)" ng-click="update_call(z)"><span class="glyphicon glyphicon-pencil"
								aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" ng-click="delete_data(z)"><span
								class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
					</tr>
				</tbody>
			</table>
        </div>
        <div class="col-sm-12">
            <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="<?=site_url('template/pagination')?>" paginate-id="album"></dir-pagination-controls>
        </div>
        
   </div>
   