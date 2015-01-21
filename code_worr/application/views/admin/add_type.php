<script type='text/javascript'>
	$('document').ready(function(){
		
		/////////// menu handling////////////////////////////
		$('.typeMainMenu').addClass("opened");
		$('.typeList').addClass("active");
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
			if(isset($addResult)){
				if($addResult == 0){
					echo "toastr.error('Please check wheather the Type already exists!!', 'Invalid Add request!', opts);";	
				}else{
					echo "toastr.success('Your Type has been added successfully!!', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>



<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Add Property Type</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>
			
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Type name</label>
				
				<div class="col-sm-5">
					<input type="text" name='typeName' class="form-control" data-validate="required" data-message-required="Type name Is Required." id="typeName" placeholder="Type Name" <?php if(isset($_POST['typeName'])) echo "value='{$_POST['typeName']}'";?>>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='addTypeSubmit' name='addTypeSubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/typeList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>