//blank line is required
app.controller('ctrl_our_services',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("our_services/view_data").success(function(data){
			console.log(data);
			$scope.datadb=data;
		})
//		$http.get("menu/view_data").success(function(data){
//			console.log(data);
//			$scope.datadb=data;
//		})
		
	}
	$scope.loader();
	$scope.update_call=function(y){
		$scope.x=y;
	}
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	$scope.save_data=function(x){
		
		$('#form1').ajaxForm({
			type: "POST",
			url: "our_services/save_data",
			beforeSend: function()
			{
				
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.x={};
					messages("success", "Success!","our_services Saved Successfully", 3000);
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
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting menu may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("our_services/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","our_services Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","our_services not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});