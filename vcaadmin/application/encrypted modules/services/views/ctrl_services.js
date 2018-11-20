//blank line is required
app.controller('ctrl_services',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.x={};
	
	$scope.loader=function(){
		$http.get("services/view").success(function(data){
			$scope.datadb=data;
		})
	}
	$scope.loader();
	
	$http.get("service_head/view?data=s_id,service_head.name").success(function(data){
		$scope.services=data;
	})
	
	$scope.filter_new=function(){
		$("#form1").trigger('reset');
		$scope.x={};
	}
	
	$scope.update=function(z){
		$scope.x=z;
	}
	
	$scope.save=function(){
		$('#submitbtn').attr('disabled',true);
		$.ajax({
			type: "POST",
			url: "services/save",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
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
				$http.get("services/delete?id="+id).success(function(data){
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