<script type='text/javascript'>
	$('document').ready(function(){
		
		/////////// menu handling////////////////////////////
		$('.companyParent').addClass("opened");
		$('.branch').addClass("active");
		/////////////////////////////////////////////////////
		
		var opts = {
				"closeButton": true,
				"debug": false,
				"positionClass": "toast-top-right",
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "0000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
		
		
		<?php
			if(isset($editResult)){
				if($editResult == 0){
					echo "toastr.error('There was problem in updating your profile!!', 'Invalid Update request!', opts);";	
				}else{
					echo "toastr.success('Your profile has been updated successfully!!', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>



<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Edit Profile</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">User Name</label>
				
				<div class="col-sm-5">
					<input type="text" name='adminUsername' class="form-control" data-validate="required" data-message-required="Admin User Name Is Required." id="adminUsername" placeholder="Admin User Name" <?php if(isset($adminDetails['admin_username'])) echo "value='{$adminDetails['admin_username']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Password</label>
				
				<div class="col-sm-5">
					<input type="password" name='adminPassword' class="form-control" data-validate="required" data-message-required="Admin Password Is Required." id="adminPassword" placeholder="Admin Password">
					<span class="description">(Give a new password to update password or give the existing one to change username)</span>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='editProfileSubmit' name='editProfileSubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/cityList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>