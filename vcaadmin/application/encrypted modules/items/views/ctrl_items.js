//blank line is required
app.controller('ctrl_items',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("items/view_data").success(function(data){
			console.log(data);
			$scope.datadb=data;
		})
		$http.get("category/view_data?data=name,category_id").success(function(data){
		$scope.category=data;
	})
	$http.get("subcategory/view_data?data=name,subcat_id").success(function(data){
		$scope.subcategory=data;
	})
	
	$http.get("item_tax/view_data?data=tax_name,item_tax_id").success(function(data){
		$scope.tax=data;
	})
	
	$http.get("item_filter/view_data?data=name,filter_id").success(function(data){
		$scope.filter=data;
	})
	}
	$scope.loader();
	$scope.update_call=function(y){
		$scope.x=y;
		$("#newform").trigger('click');
	}
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	$scope.save_data=function(x){
		
		$('#form1').ajaxForm({
			type: "POST",
			url: "items/save_data",
			beforeSend: function()
			{
//				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.x={};
					messages("success", "Success!","Item Saved Successfully", 3000);
					$scope.loader();
					
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", .3000);
				}
				else
				{
					messages("danger", "Warning!",data, 8000);
				}
				$('#webprogress').css('display','none');
//				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting menu may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("items/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","item Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","items not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});