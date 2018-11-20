//blank line is required
app.controller('ctrl_dashboard',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$http.get("dashboard/fetch_cards_data").success(function(data){
		$scope.guestbook_row=data['guestbook_row'];
		$scope.department_row=data['department_row'];
//		$scope.doctor_row=data['doctor_row'];
//		$scope.hotdeal_row=data['hotdeal_row'];
		$scope.gallery_row=data['gallery_row'];
//		$scope.slider_row=data['slider_row'];
//		
//		$scope.news_row=data['news_row'];
		$scope.contact_row=data['contact_row'];
	})
	
});