app.controller('ctrl_calendar', function($scope, $http) {
	$http.get('login/check_valid_session').success (function(data) {if(data.status==0){window.location.assign('<?=site_url("login")?>');}});
	//***whole module depends on adms_id as set on $watch function and global variables or scope must be defined in ctrl_admission as to wwork on all ctrls
	
	
	
	
	$scope.name="shiwam";
	
//	$scope.previous_url=function(){
//		year=$("#year").val();
//		month=$("#month").val();
//		
//		$http.get('calendar/previous_url/'+year+"/"+month).success(function(data) {
//			console.log(data);
//			$("#calendar").html(data);
//		});
//	}
//	$scope.next_url=function(){
//		console.log("next_url");
//		$http.get('calendar/display').success(function(data) {
//			$("#calendar").html(data);
//		});
//	}
});