<script type='text/javascript'>
	$('document').ready(function(){
		
		/////////// menu handling////////////////////////////
		$('.propertyMainMenu').addClass("opened");
		$('.propertyList').addClass("active");
		/////////////////////////////////////////////////////
		
		var opts = {
				"closeButton": true,
				"debug": false,
				"positionClass": "toast-top-right",
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			};
		
		$("#addPropertySubmit").click(function(){
			var typeId = $("#propertyType").val();
			var cityId = $("#cityId").val();
			
			if(typeId == ""){
				toastr.error('Please select a property Type', 'Invalid Add request!', opts);
				$("#propertyType").focus();
				return false;
			}
			
			if(cityId == ""){
				toastr.error('Please select a Location', 'Invalid Add request!', opts);
				$("#cityId").focus();
				return false;
			}
		});
		
		<?php
			if(isset($addResult)){
				if($addResult == 0){
					echo "toastr.error('There was a probalem in adding your property, please try again!', 'Invalid Add request!', opts);";	
				}else{
					echo "toastr.success('Your Property has been added successfully!!', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>



<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Add Property</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Property Title</label>
				
				<div class="col-sm-5">
					<input type="text" name='propertyTitle' class="form-control" data-validate="required" data-message-required="Property Title Is Required." id="propertyTitle" placeholder="Property Title" <?php if(isset($_POST['propertyTitle'])) echo "value='{$_POST['propertyTitle']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Property Type</label>
				
				<div class="col-sm-5">
					<select class="form-control" id='propertyType' name='propertyType'>
						<option value=''></option>
						<?php
							foreach($typeList as $aType){
								$selectHtml = "";
								if(isset($_POST['propertyType'])){
									if($_POST['propertyType'] == $aType['type_id']){
										$selectHtml = "selected";
									}
								}
								echo "<option value='{$aType['type_id']}' $selectHtml>{$aType['type_name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Location</label>
				
				<div class="col-sm-5">
					<select class="form-control" id='cityId' name='cityId'>
						<option value=''></option>
						<?php
							foreach($cityList as $aCity){
								$selectHtml = "";
								if(isset($_POST['cityId'])){
									if($_POST['cityId'] == $aCity['city_id']){
										$selectHtml = "selected";
									}
								}
								echo "<option value='{$aCity['city_id']}' $selectHtml>{$aCity['city_name']}</option>";
							}
						?>
					</select>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Bed Rooms</label>
				
				<div class="col-sm-5">
					<input type="text" name='bedroom' class="form-control" data-validate="required,number" data-message-required="Bedroom number Is Required." id="bedroom" placeholder="Bedroom" <?php if(isset($_POST['bedroom'])) echo "value='{$_POST['bedroom']}'";?>>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Maximum Guest</label>
				
				<div class="col-sm-5">
					<input type="text" name='maxGuest' class="form-control" data-validate="required,number" data-message-required="Maximum guest number Is Required." id="maxGuest" placeholder="Maximum number of guest" <?php if(isset($_POST['maxGuest'])) echo "value='{$_POST['maxGuest']}'";?>>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Expense Per night</label>
				
				<div class="col-sm-5">
					<input type="text" name='expense' class="form-control" data-validate="required" data-message-required="Expense per night Is Required." id="expense" placeholder="Expense per night" <?php if(isset($_POST['expense'])) echo "value='{$_POST['expense']}'";?>>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Featured</label>
				<div class="col-sm-5">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="isFeatured" value="1" <?php if(isset($_POST['isFeatured'])){ if($_POST['isFeatured'] == 1) echo " checked ";}?>>
						</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Full Description</label>
				
				<div class="col-sm-5">
					<textarea name='fullDescription' class="form-control ckeditor"><?php if(isset($_POST['fullDescription'])) echo $_POST['fullDescription'];?></textarea>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Status</label>
				
				<div class="col-sm-5">
					<select class="form-control" id='status' name='status'>
						<?php
							if(!isset($_POST['status'])){
								$_POST['status'] = -1;
							}
						?>
						<option value='1' <?php if($_POST['status'] == 1) echo " selected ";?> >Published</option>
						<option value='0' <?php if($_POST['status'] == 0) echo " selected ";?>>Draft</option>
					</select>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='addPropertySubmit' name='addPropertySubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/propertyList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>