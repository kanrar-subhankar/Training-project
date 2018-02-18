
$(document).ready(function(){
	document.getElementsByName('user_mail')[0].placeholder='Enter your email';
	document.getElementsByName('pwd')[0].placeholder='Enter your password';
	$('#sign_in').css('color','rgb(33,156,178)');
	$('#sign_in').css('border-bottom','2px solid rgb(33,156,178)');
	$('#sign_in').css('transition','0.6s');
	$('#left').show();
	$('#later').hide();

});
	$('#usr_mail').click(function(){
		var str = $(this).attr('placeholder');
		$("#user_context1").text(str);
		//$("#user_context1").animate({text:$str},500);
		document.getElementsByName('user_mail')[0].placeholder="";
		//$("#user_context1").css('-moz-transition','0.3s');
		if($('#usr_pwd').val()==''){
			document.getElementsByName('pwd')[0].placeholder="Enter your password";
			$("#user_context2").text('');
		}
		
	});
	$('#usr_pwd').click(function(){
		var str = $(this).attr('placeholder');
		$("#user_context2").text(str);
		document.getElementsByName('pwd')[0].placeholder="";
		if($('#usr_mail').val()==''){
			document.getElementsByName('user_mail')[0].placeholder="Enter your email";
			$("#user_context1").text('');
		}
	});
	$('#sign_up').click(function(){
		$('#initial').hide();
		$('#later').show();
		$('#sign_in').css('color','rgb(174,181,193)')
		$('#sign_up').css('color','rgb(33,156,178)');
		$('#sign_up').css('border-bottom','2px solid rgb(33,156,178)');
		$('#sign_in').css('border','0px');
		
	});
	$('#sign_in').click(function(){
		$('#initial').show();
		$('#later').hide();
		$('#sign_up').css('color','rgb(174,181,193)')
		$('#sign_in').css('color','rgb(33,156,178)');
		$('#sign_in').css('border-bottom','2px solid rgb(33,156,178)');
		$('#sign_up').css('border','0px');
		
	});

