<div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<h5 class="sub_title">Register Account</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
					<div class="button1">
					   <a href=""><input type="submit" name="Submit" value="Continue"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
	           		
	           		<div class="alert alert-danger errorAlertBox" style="display: none;" role="alert">
			     	<!-- <strong>Ops!</strong> -->
			    </div>
			    
			    <div class="alert alert-success successAlertBox" style="display: none;" role="alert">
			     	<!-- <strong>Ops!</strong> -->
			    </div>
			    
					 <div class="comments-area">
						<form>
							<p>
								<label>Email Address</label>
								<span>*</span>
								<input type="text" name="email_address" class="email_address">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input type="password" name="password" class="password">
							</p>
							 <p id="login-form-remember">
								<label><a href="">Forget Your Password ? </a></label>
							 </p>
							 <p>
								<input type="submit" name="submitLoginButton" class="submitLoginButton" value="Login">
							</p>
						</form>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		
<script type="text/javascript">
	$(document).ready(function(){
		$(".submitLoginButton").click(function(e){
			e.preventDefault();
			
			$(".errorAlertBox").slideUp();
			$(".successAlertBox").slideUp();
			
			var email_address = $(".email_address").val();
			var password = $(".password").val();
			
			var pattern = "/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i";
			
			var error = "";
		

			if(email_address == ""){
				error = "Email Address cannot be left blank!";
			}
			else if(!validateEmail(email_address)){
				error = "Email address is not valid";
			}
			else if(password == ""){
				error = "Password cannot be left blank!";
			}
			
			if(error != ""){
				$(".errorAlertBox").html("<strong>Ops!</strong> " + error);
				$(".errorAlertBox").slideDown();	
			}else{
				$.ajax({
					 type: "POST",
					 url: "webservice/checkLogin",
					 data: { email_address: email_address, password: $.md5(password)  }
				})
				.done(function( msg ) {
					 var jsonObj = jQuery.parseJSON( msg );
					 if(jsonObj.result != 'success'){
					 	$(".errorAlertBox").html("<strong>Ops!</strong> " + jsonObj.message);
						$(".errorAlertBox").slideDown();
					 }else{
					 	location.href = "profile";
					 }
				});
			}
			
			
			
			
		});
		
		function validateEmail(email){
			var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
			var valid = emailReg.test(email);

			if(!valid) {
		        return false;
		    } else {
		    	return true;
		    }
		}
	});
</script>



<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/jquery.md5.js"></script>		