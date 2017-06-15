
/********************正则*************************/ 
var pattern_user = /^([a-zA-Z0-9]|[._]){4,19}$/;  
var pattern_psd = /^[a-zA-Z0-9]{5,14}$/;

/********************正则*************************/ 
$('#user').blur(function(){
	if(pattern_user.test($(this).val()))
	{
		var username = $(this).val();
		$.ajax({
					type:'POST',
					url:'./js/2.php',
					data:{'username':username}, //要上传的数据;
					success:function(msg){
						if(msg==1)
						{
							$('#username_span').html('该账号尚未注册');
							$('#myusername').data({"x":1});
						}
						else
						{
							 $('#username_span').html('');
							 $('#myusername').data({"x":0});
						}
					}
				})
	}
	else
	{
		$('#username_span').html('请输入4-19位字符');
		$(this).data({"x":0});
	}
});

// $('#sub').click(function(){
	
// 	//return false;
// });

