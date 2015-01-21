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
			if(isset($_POST['addImageSubmit'])){
				if(isset($error)){
					echo "toastr.error('{$error}', 'Invalid Add request!', opts);";	
				}else{
					echo "toastr.success('{$success}', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>



<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Add Media</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST' enctype="multipart/form-data">
			
			<div class="form-group">
				<label class="col-sm-3 control-label">Media File</label>
				
				<div class="col-sm-5">
					
					<input type="file" multiple="" name="mediaFile[]" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />
					
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='addImageSubmit' name='addImageSubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/propertyList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>