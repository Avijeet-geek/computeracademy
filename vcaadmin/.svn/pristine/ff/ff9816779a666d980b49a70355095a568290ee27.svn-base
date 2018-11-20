//blank line is required
app.controller('ctrl_users',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	
	$http.get("users/view_data").success(function(data){
		$scope.datadb=data;
	})
	
	$scope.update_call=function(y){
		$scope.x=y;
	}
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	$scope.save_data=function(x){
		$('#submitbtn').attr('disabled',true);
		$.ajax({
			type: "POST",
			url: "users/save_data",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				if(data=="1")
				{
					messages("success", "Success!","User Details Saved Successfully", 4000);
					$http.get("users/view_data").success(function(data){
						$scope.datadb=data;
					})
					$scope.x={};
				}
				else if(data=="0")
				{
					messages("warning", "Info!","No Data Affected", 10000);
				}
				else
				{
					messages("warning", "Warning!",data, 10000);
				}
				$('#webprogress').css('display','none');
			}
		});
		$('#submitbtn').attr('disabled',false);
	}
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting userss may hamper your data associated with it. You will loose the data related with this users."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("users/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","User Deleted Successfully", 4000);
					}
					else
					{
						messages("danger", "Warning!","User not Deleted", 10000);
					}
					$http.get("users/view_data").success(function(data){
						$scope.datadb=data;
					})
				})
			}
		}
	}
	
});