//blank line is required
app.controller('ctrl_service_head',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.x={};
	
	$scope.loader=function(){
		$http.get("service_head/view").success(function(data){
			$scope.datadb=data;
		})
	}
	$scope.loader();
	
	$http.get("menu/view_data?data=menu_id,name").success(function(data){
		$scope.menus=data;
	})
	
	$scope.filter_new=function(){
		$("#form1").trigger('reset');
		$scope.x={};
	}
	
	$scope.update=function(z){
		$scope.x=z;
	}
	
	
	$scope.filter_new=function(){
		$scope.x={};
	}

	
	$scope.save=function(x){
		$('#form1').ajaxForm({
			type: "POST",
			url: "service_head/save",
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.loader();
					messages("success", "Success!","Service Saved Successfully", 3000);
					$scope.filter_new();
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", 3000);
				}
				else
				{
					messages("danger", "Warning!",data, 4000);
				}
				$('#webprogress').css('display','none');
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting Service may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("service_head/delete?id="+id).success(function(data){
					if(data=="1")
					{
						messages("success", "Success!","service Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","service not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
});