//blank line is required
app.controller('ctrl_doctor',function($scope,$http,$filter){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.fetch_doctordata=function(){
		$http.get("doctor/view_data").success(function(data){
			$scope.datadb=data;
		})
	}
	$scope.fetch_doctordata();
	
	$http.get("department/view_data?data=name,department_id").success(function(data){
		$scope.department=data;
	})
	
	$scope.update_call=function(y){
		$scope.x=y;
	}
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
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	$scope.save_data=function(x){
		$('#form1').ajaxForm({
			type: "POST",
			url: "doctor/save_data",
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Data Saved Successfully</div>");
					$scope.fetch_doctordata();
					$scope.x={};
					$('#form1').trigger('reset');
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
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
		{
			$http.get("doctor/delete_data?id="+x.doctor_id).success(function(data){
				
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Data Deleted Successfully</div>");
				}
				else
				{
					$("#result").html("<div class='alert alert-danger'>Data not Deleted</div>");
				}
				$scope.fetch_doctordata();
			})
		}
	}
	
});