// JavaScript Document

$('document').ready(function()
{ 
     /* validation */
	 $("#register-form").validate({
      rules:
	  {
			user_name: {
		    required: true,
			minlength: 3
			},
			password: {
			required: true,
			minlength: 4,
			maxlength: 15
			},
			cpassword: {
			required: true,
			equalTo: '#password'
			},
			user_email: {
            required: true,
            email: true
            },
			original_pw: {
			required: true,
			minlength: 4,
			maxlength: 15
			},
			new_pw: {
			required: true,
			minlength: 4,
			maxlength: 15
			},
			new_cpw: {
			required: true,
			equalTo: '#new_pw'
			},
	   },
       messages:
	   {
            user_name: "請輸入帳號",
            password:{
                      required: "請輸入密碼",
                      minlength: "密碼至少4位"
                     },
            user_email: "please enter a valid email address",
			cpassword:{
						required: "請確認密碼",
						equalTo: "兩次密碼不符!"
					  },
			new_cpw:{
						required: "請確認新密碼",
						equalTo: "兩次密碼不符!"
					  },
			original_pw: "請輸入原有密碼",
			new_pw: "請輸入新密碼",					  
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	   function submitForm()
	   {		
				var data = $("#register-form").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'process.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
											$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');
											
										
									});
																				
								}
								else if(data=="registered")
								{
									
									setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("success.php"); }); ',5000);
									
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' </div>');
											
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
	 

});