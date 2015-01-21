<script type='text/javascript'>
	$('document').ready(function(){
		
		/////////// menu handling////////////////////////////
		$('.contentMainMenu').addClass("opened");
		<?php 
			if($_GET['contentId'] == 1){
				echo "\$('.homeSubMenu').addClass('active');";
			}else if($_GET['contentId'] == 2){
				echo "\$('.aboutUsSubMenu').addClass('active');";
			}else if($_GET['contentId'] == 3){
				echo "\$('.contactUsSubMenu').addClass('active');";
			}else if($_GET['contentId'] == 4){
				echo "\$('.rateSubMenu').addClass('active');";
			}
		?>
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
					echo "toastr.error('There was problem in updating Content details!', 'Invalid Update request!', opts);";	
				}else{
					echo "toastr.success('Your Content has been updated successfully!!', 'Request Accepted!', opts);";	
				}
			}
		?>
		
	});
</script>





<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Edit Contents</h2>
		</div>
	</div>
	
	<div class='panel-body'>
		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>	
			
		
			<div class="form-group">
				<label for="field-1" class="col-sm-3 control-label">Full Description</label>
				
				<div class="col-sm-9">
					<textarea name='contents' class="form-control ckeditor"><?php if(isset($contentDetails['contents'])) echo $contentDetails['contents'];?></textarea>
				</div>
			</div>
			
			
			
			
			
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-5">
				
					<button type="submit" id='editContentSubmit' name='editContentSubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>	
					
					<a href="<?php echo  $this->config->base_url();?>admin/index/propertyList">
						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>	
					</a>
					
				</div>
			</div>
		</form>
	</div>
</div>