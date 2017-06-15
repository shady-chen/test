

	//昵称的正则
	var pattern_nick = /^[\u4e00-\u9fa50-9a-zA-Z]{1,20}$/;
	// 用户名的正则
	var pattern_user = /^([a-zA-Z0-9]|[._]){4,19}$/;  
	//密码正则
	var pattern_psd = /^[a-zA-Z0-9]{5,14}$/;

	// 获取输入框 和提交按钮
	var input_user = document.getElementById('myusername');
	var input_psd = document.getElementById('mypassword');
	var input_nick = document.getElementById('nickname');
	var btn_sub = document.getElementById('sub');
	

//昵称验证
	$('#nickname').keyup(function(){
		if(pattern_nick.test(input_nick.value))
		{
			$('#nickname_span').html('该昵称可以使用');
			$(this).data({"x":1});
		}
		else
		{
			$('#nickname_span').html('请输入1-20位字符');

			$(this).data({"x":0});
		}
	})


// 用户名验证 ajax请求 (和正则)
	$('#myusername').keyup(function(){
		if(pattern_user.test(input_user.value))
		{
			var username = $(this).val();
			$.ajax({
					type:'POST',
					url:'./js/1.php',
					data:{'username':username}, //要上传的数据;
					success:function(msg){
						if(msg==1)
						{
							$('#username_span').html('该账号可以使用');
							$('#myusername').data({"x":1});
							
						}
						else
						{
							$('#username_span').html('该账号已经被使用');
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
//密码验证
	$('#mypassword').keyup(function(){
		if(pattern_psd.test(input_psd.value))
		{
			$('#password_span').html('该可以使用');
			$(this).data({"x":1});
			
		}
		else
		{
			$('#password_span').html('请输入5-14位字符');
			$(this).data({"x":0});
		}
	}	);



	btn_sub.onclick = function ()
	{
		var a=0;
		// 点击提交 触发三个按钮
		$('#nickname').keyup();
		$('#myusername').keyup();
		$('#mypassword').keyup();
		
		a=$('#nickname').data('x')+$('#myusername').data('x')+$('#mypassword').data('x');
		if(a!=3)
		{
			console.log(a,$('#nickname').data('x'));
			return false;
		}
		
	}












