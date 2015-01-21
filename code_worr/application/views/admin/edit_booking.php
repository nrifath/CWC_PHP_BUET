<script type='text/javascript'>
	$('document').ready(function(){
		
		/////////// menu handling////////////////////////////
		$('.bookingMainMenu').addClass("opened");
		$('.bookingListSubmenu').addClass("active");
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
		
		$("#editBookingSubmit").click(function(){
			if($("#country").val().trim() == ""){
				toastr.error('Please Select any country!!', 'Invalid Update request!', opts);
				return false;
			}
		});
		
		<?php
			if(isset($editResult)){
				if($editResult == 0){
					echo "toastr.error('There was problem in updating booking details!', 'Invalid Update request!', opts);";	
				}else{
					echo "toastr.success('Your booking has been updated successfully!!', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>



<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Edit Booking Details</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Start Date</label>
				
				<div class="col-sm-5">
					<input type="text" name='startDate' class="form-control datepicker" data-format="yyyy-mm-dd" data-validate="required" data-message-required="Start date Is Required." id="startDate" placeholder="Booking Start Name" <?php if(isset($bookingDetails['start_date'])) echo "value='{$bookingDetails['start_date']}'";?>>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">End Date</label>
				
				<div class="col-sm-5">
					<input type="text" name='endDate' class="form-control datepicker" data-format="yyyy-mm-dd" data-validate="required" data-message-required="End date Is Required." id="endDate" placeholder="Booking End Name" <?php if(isset($bookingDetails['end_date'])) echo "value='{$bookingDetails['end_date']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Number of persons to stay</label>
				
				<div class="col-sm-5">
					<input type="text" name='numberOfPersonToStay' class="form-control" data-validate="required" data-message-required="Person number Is Required." id="numberOfPersonToStay" placeholder="Number of person to stay" <?php if(isset($bookingDetails['no_of_person_to_stay'])) echo "value='{$bookingDetails['no_of_person_to_stay']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">First Name</label>
				
				<div class="col-sm-5">
					<input type="text" name='clientFirstName' class="form-control"  data-validate="required" data-message-required="Person First Name Is Required." id="clientFirstName" placeholder="User first name" <?php if(isset($bookingDetails['client_first_name'])) echo "value='{$bookingDetails['client_first_name']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Last Name</label>
				
				<div class="col-sm-5">
					<input type="text" name='clientLastName' class="form-control"  data-validate="required" data-message-required="Person Last Name Is Required." id="clientLastName" placeholder="User last name" <?php if(isset($bookingDetails['client_last_name'])) echo "value='{$bookingDetails['client_last_name']}'";?>>
				</div>
			</div>
			
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Email address</label>
				
				<div class="col-sm-5">
					<input type="text" name='clientEmail' class="form-control"  data-validate="required,email" data-message-required="Person Email Is Required." id="clientEmail" placeholder="User email" <?php if(isset($bookingDetails['client_email'])) echo "value='{$bookingDetails['client_email']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Contact number</label>
				
				<div class="col-sm-5">
					<input type="text" name='clientContactNumber' class="form-control"  data-validate="required" data-message-required="Person Contact address Is Required." id="clientContactNumber" placeholder="User Contact address" <?php if(isset($bookingDetails['client_contact_number'])) echo "value='{$bookingDetails['client_contact_number']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">User's country</label>
				
				<div class="col-sm-5">
					<select class="form-control" id='country' name='country'>
						<option value=''></option>
						<?php
							foreach($countryList as $aCountry){
								$selectHtml = "";
								if($aCountry['value'] == $bookingDetails['client_country']){
									$selectHtml = " selected ";
								}
								echo "<option {$selectHtml} value='{$aCountry['value']}'>{$aCountry['name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Comments</label>
				
				<div class="col-sm-5">
					<textarea style="height: 150px;" name='comments' class="form-control"><?php if(isset($bookingDetails['comments'])) echo $bookingDetails['comments'];?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Added On</label>
				
				<div class="col-sm-5">
					<input type="text" name='addedOn' class="form-control datepicker" data-format="yyyy-mm-dd" data-validate="required" data-message-required="Added date Is Required." id="addedOn" placeholder="Booking adding date" <?php if(isset($bookingDetails['added_on'])) echo "value='{$bookingDetails['added_on']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='editBookingSubmit' name='editBookingSubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/activeBookingList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>