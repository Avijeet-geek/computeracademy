//blank line is required
app.controller('ctrl_slider',function($scope,$http,$filter){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.htmlToPlaintext=function(text){
		text=text ? String(text).replace(/<[^>]+>/gm, '') : '';
		text=text.substr(0,90);
		return text;
	}
	
	$http.get("slider/view_data").success(function(data){
		$scope.datadb=data;
	})
	
	$scope.update_call=function(y){
		$scope.x=y;
	}
	$scope.options = {
		    height: 200,
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
			url: "slider/save_data",
//			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Data Saved Successfully</div>");
					$http.get("slider/view_data").success(function(data){
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
				$('#submitbtn').attr('disabled',false);
			}
		});
	}
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
		{
			$http.get("slider/delete_data?id="+x.auto_id).success(function(data){
				console.log(data);
				if(data=="1")
				{
					$("#result").html("<div class='alert alert-success'>Data Deleted Successfully</div>");
				}
				else
				{
					$("#result").html("<div class='alert alert-danger'>Data not Deleted</div>");
				}
				$http.get("slider/view_data").success(function(data){
					$scope.datadb=data;
				})
			})
		}
	}
	
});