//blank line is required
app.controller('ctrl_news',function($scope,$http,$filter){
	$http.get('login/check_valid_session').success (function(data) {if(data!=1){window.location.assign('<?=site_url("login")?>');}});
	
	$scope.htmlToPlaintext=function(text){
		text=text ? String(text).replace(/<[^>]+>/gm, '') : '';
		text=text.substr(0,90);
		return text;
	}
	
	$scope.loadData=function(){
		$http.get("news/view_data").success(function(data){
			$scope.datadb=data;
		});
	};
	$scope.loadData();
	
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
			url: "news/save_data",
//			data: $("#form1").serialize(),
			beforeSend: function()
			{
				$('#submitbtn').attr('disabled',true);
				$('#webprogress').css('display','inline');
			},
			success: function(data){
				if(data=="1")
				{
					messages('success','Success!','Data Saved Successfully',4000);
					$scope.loadData();
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
	$scope.delete_data=function(x)
	{
		if(confirm("Are you Sure to DELETE ??"))
		{
			$http.get("news/delete_data?id="+x.auto_id).success(function(data){
				console.log(data);
				if(data=="1")
				{
					messages('success','Success!','Data Deleted Successfully',4000);
					$scope.loadData();
				}
				else
				{
					messages('success','Success!','Data not Deleted',10000);
				}
			})
		}
	}
	
});