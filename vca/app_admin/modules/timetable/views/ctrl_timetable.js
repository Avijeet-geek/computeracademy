//blank line is required
app.controller('ctrl_timetable',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	$scope.options = {
		    height: 100,
		    toolbar: [
		            ['style', ['bold', 'italic', 'underline']],
	  		           ['fontname', ['fontname']],
	  		           ['fontsize', ['fontsize']],
	  		           ['table',['table']],
	  		           ['color', ['color']]
		        ]
		  };
	$scope.htmlToPlaintext=function(text){
		text=text ? String(text).replace(/<[^>]+>/gm, '') : '';
		text=text.substr(0,90);
		return text;
	}
	
	$http.get("department/view_data").success(function(data){
		$scope.department=data;
	})
	$http.get("doctor/view_data").success(function(data){
		$scope.doctor=data;
	})
	$scope.fetch_department=function(id)
	{
		$http.get("doctor/fetch_department?doctor_id="+id).success(function(data){
			$scope.x.department=data['0'].department;
			$scope.x.doctor_name=data['0'].name;			
		})
	}
	
	$http.get("timetable/view_data").success(function(data){
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
			url: "timetable/save_data",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Data Saved Successfully</div>");
					$http.get("timetable/view_data").success(function(data){
						$scope.datadb=data;
					})
					$scope.x={};
					$("#validation").html("");
				}
				else if(data=="0")
				{
					$("#result").html("<div class='alert alert-info'>No Data Affected</div>");
					$("#validation").html("");
				}
				else
				{
					$("#validation").html("<div class='alert alert-danger'>"+data+"</div>");
					$("#result").html("");
				}
				$('#webprogress').css('display','none');
			}
		});
		$('#submitbtn').attr('disabled',false);
	}
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("timetable/delete_data?id="+x.timetable_id).success(function(data){
					if(data=="1")
					{
						$("#result").html("<div class='alert alert-success'>Data Deleted Successfully</div>");
					}
					else
					{
						$("#result").html("<div class='alert alert-danger'>Data not Deleted</div>");
					}
					$http.get("timetable/view_data").success(function(data){
						$scope.datadb=data;
					})
				})
			}
	}

});