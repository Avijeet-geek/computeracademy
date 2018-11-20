app.controller('ctrl_settings',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.x={};
	$scope.save_data=function(x){
		console.log(x);
		$('#form1').ajaxForm({
			type: "POST",
			url: "settings/save_data",
//			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					messages('success','Success!','Data Saved Successfully',4000);
					//$scope.loadData();
					$scope.x={};
				}
				else if(data=="0")
				{
					
					messages('warning','Warning!','No Data Affected',10000);
				}
				else
				{
					messages('danger','Danger!',data,10000);
				}
				$('#webprogress').css('display','none');
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	$http.get("settings/view_data").success(function(data){
		$scope.x=data[0];
	})
	
});