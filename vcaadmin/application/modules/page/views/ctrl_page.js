//blank line is required
app.controller('ctrl_page',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("page/view_data").success(function(data){
			$scope.datadb=data;
		})
	}
	
	$http.get("menu/view_data?data=menu_id,type").success(function(data){
		$scope.pages=data;
	})
	$http.get("slider/view_data?data=slider_id,title").success(function(data){
	    $scope.sliders=data;
	})
	
	$scope.fetch_menu=function(type){
		if(type!='0'){
			if(type=='1' || type=='4' || type=='2')
				url="menu/view_data";
			if(type=='3')
				url="service_head/view";
//			if(type=='3')
//				url="services/view";
				
			$http.get(url).success(function(data){
				$scope.menus=data;
			})
		}
	}
	
	$scope.options = {
		    height: 150,
		    toolbar: [
		               ['style', ["undo","redo",'style','bold', 'italic', 'underline']],
      		           ['fontsize', ['fontsize']],
      		           ['color', ['color']],
      		           [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
      		           ['font', ['strikethrough', 'superscript', 'subscript']],
      		           ['table',['table']],
      		           [ 'insert', [ 'link','video','hr','picture'] ],
      	               ["view", ["fullscreen", "codeview", "help",]]
		        ]
		  };
	
	
	$scope.loader();
	$scope.update_call=function(y){
		var url="http://sohumhome.com/index.php";
		$scope.fetch_menu(y.menu_type);
		$scope.x=y;
		if(y.menu_type==1){
			$scope.page_url=url+"/page/view?id="+y.m_id;
		}
		else if(y.menu_type==2){
			$scope.page_url=url+"/page/view?s_id="+y.m_id;
		}
		else if(y.menu_type==3){
			$scope.page_url=url+"/page/view?cs_id="+y.m_id;
		}
		else if(y.menu_type==4){
			$scope.page_url=url+"/page/view?id="+y.m_id;
		}
		else {
			$scope.page_url=url+"/page/view?page_id="+y.page_id;
		}
		$("#create_pg").trigger('click');
	}
	
	$scope.filter_new=function(){
		$scope.x={};
	}

	$scope.save_data=function(x){
		$('#form1').ajaxForm({
			type: "POST",
			url: "page/save_data",
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.loader();
					messages("success", "Success!","page Saved Successfully", 3000);
					//$scope.loader();
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
		if(confirm("Deleting menu may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("page/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","page Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","page not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});