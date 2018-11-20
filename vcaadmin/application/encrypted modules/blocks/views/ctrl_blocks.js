//blank line is required
app.controller('ctrl_blocks',function($scope,$http){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.loader=function(){
		$http.get("blocks/view_data").success(function(data){
			console.log(data);
			$scope.datadb=data;
		})
//		$http.get("menu/view_data").success(function(data){
//			console.log(data);
//			$scope.datadb=data;
//		})
		
	}
	$scope.htmlToPlaintext=function(text){
		text=text ? String(text).replace(/<[^>]+>/gm, '') : '';
		text=text.substr(0,90);
		return text;
	}
	$scope.options = {
		    height: 250,
		    toolbar: [
		            ['style', ['bold', 'italic', 'underline']],
      		           ['fontname', ['fontname']],
      		           ['fontsize', ['fontsize']],
      		           ['table',['table']],
      		           ['color', ['color']],
      		         ['view', ['fullscreen', 'codeview']]
      		         
		        ]
		  };
	
	$scope.loader();
	$scope.update_call=function(y){
		$scope.x=y;
	}
	
	$scope.filter_new=function(){
		$scope.x={};
	}
	
	$scope.save_data=function(y){
		$('#submitbtn').attr('disabled',true);
		$.ajax({
			type: "POST",
			url: "blocks/save_data",
			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				console.log(data);
				if(data=="1")
				{
					$scope.x={};
					messages("success", "Success!","Block Saved Successfully", 3000);
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
			}
		});
		$('#submitbtn').attr('disabled',false);
	}
	$scope.delete_data=function(id)
	{
		if(confirm("Deleting block may hamper your data associated with it."))
		{
			if(confirm("Are you Sure to DELETE ??"))
			{
				$http.get("blocks/delete_data?id="+id).success(function(data){
					console.log(data);
					if(data=="1")
					{
						messages("success", "Success!","Block Deleted Successfully", 3000);
					}
					else
					{
						messages("danger", "Warning!","Block not Deleted", 4000);
					}
					$scope.loader();
				})
			}
		}
	}
	
});