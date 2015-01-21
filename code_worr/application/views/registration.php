<div class="register_account">
          	<div class="wrap">
    	      <h4 class="title">Create an Account</h4>
    	      
    	      <div class="alert alert-danger errorAlertBox" style="display: none;" role="alert">
			     	<!-- <strong>Ops!</strong> -->
			    </div>
			    
			    <div class="alert alert-success successAlertBox" style="display: none;" role="alert">
			     	<!-- <strong>Ops!</strong> -->
			    </div>
    	      
    		   <form>
    		   	
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input type="text" class="first_name error" name="first_name" placeholder="First Name"></div>
		   			 <div><input type="text" class="last_name" name="last_name" placeholder="Last Name"></div>
		    		 <div><input type="text" name="email_address" class="email_address" placeholder="E-Mail"></div>
		    		 <div><input type="password" name="password" class="password" placeholder="Password"></div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">	
		    		<div><input type="text" placeholder="Address" name="address" class="address"></div>
		    		<div><select id="country" name="country" class="country" class="frm-field required">
		            <option value="">Select a Country</option>         
		            
		            <?php
		            	foreach($countryList as $aCountry){
							echo "<option value='{$aCountry['country_id']}'>{$aCountry['name']}</option>";
						}	
		            ?>
		            
		         </select></div>		        
		          <div><input type="text" placeholder="City" name="city" class="city"></div>
		            <input type="text" placeholder="xxx" name="code" class="code"> - <input type="text" placeholder="xxxxxxxxxxx" name="number" class="number">
		          	 <p class="code">Country Code + Phone Number</p>
		          </div>
		         <button class="grey submitRegisterButton">Register</button>
		         <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		         <div class="clear"></div>
		    </form>
    	  </div> 
        </div>
        
        
        
<script type="text/javascript">
	$(document).ready(function(){
		$(".submitRegisterButton").click(function(e){
			e.preventDefault();
			
			$(".errorAlertBox").slideUp();
			$(".successAlertBox").slideUp();
			
			var first_name = $(".first_name").val();
			var last_name = $(".last_name").val();
			var email_address = $(".email_address").val();
			var password = $(".password").val();
			var address = $(".address").val();
			var city = $(".city").val();
			var country = $(".country").val();
			var cell_no = $(".cell_no").val();
			var code = $(".code").val();
			var number = $(".number").val();
			
			var pattern = "/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i";
			
			var error = "";
		

			if(first_name == ""){
				error = "First Name cannot be left blank!";
			}
			else if(last_name == ""){
				error = "Last Name cannot be left blank!";
			}
			else if(email_address == ""){
				error = "Email Address cannot be left blank!";
			}
			else if(!validateEmail(email_address)){
				error = "Email address is not valid";
			}
			else if(password == ""){
				error = "Password cannot be left blank!";
			}
			else if(address == ""){
				error = "Address cannot be left blank!";
			}
			else if(country == ""){
				error = "Country cannot be left blank!";
			}
			else if(city == ""){
				error = "City cannot be left blank!";
			}
			else if(code == ""){
				error = "Country code of Mobile Number cannot be left blank!";
			}
			else if(number == ""){
				error = "Mobile Number cannot be left blank!";
			}
			
			if(error != ""){
				$(".errorAlertBox").html("<strong>Ops!</strong> " + error);
				$(".errorAlertBox").slideDown();	
			}else{
				$.ajax({
					 type: "POST",
					 url: "webservice/registration",
					 data: { first_name: first_name, last_name: last_name, email_address: email_address, password: $.md5(password), address: address, city: city, country: country, cell_no: code+number  }
				})
				.done(function( msg ) {
					 var jsonObj = jQuery.parseJSON( msg );
					 if(jsonObj.result === -1){
					 	$(".errorAlertBox").html("<strong>Ops!</strong> Email Address already exists!");
						$(".errorAlertBox").slideDown();
					 }else if(jsonObj.result === false){
					 	$(".errorAlertBox").html("<strong>Ops!</strong> There was a problem in registering, please try again!");
						$(".errorAlertBox").slideDown();
					 }else{
					 	$(".successAlertBox").html("<strong>Success!</strong> You have been registered successfully! Please <a href='login'>Login</a>");
						$(".successAlertBox").slideDown();
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
        