<script type='text/javascript'>	$('document').ready(function(){				/////////// menu handling////////////////////////////		$('.locationMainMenu').addClass("opened");		$('.locationListSubMenu').addClass("active");		/////////////////////////////////////////////////////				var opts = {				"closeButton": true,				"debug": false,				"positionClass": "toast-top-right",				"onclick": null,				"showDuration": "300",				"hideDuration": "1000",				"timeOut": "0000",				"extendedTimeOut": "1000",				"showEasing": "swing",				"hideEasing": "linear",				"showMethod": "fadeIn",				"hideMethod": "fadeOut"			};						<?php			if(isset($addResult)){				if($addResult == 0){					echo "toastr.error('Please check wheather the City already exists!!', 'Invalid Add request!', opts);";					}else{					echo "toastr.success('Your city has been added successfully!!', 'Request Accepted!', opts);";					}			}		?>			});</script><div class='panel panel-primary' data-collapsed="0">	<div class='panel-heading'>		<div class='panel-title'>			<h2>Add City</h2>		</div>	</div>		<div class='panel-body'>		<form role="form" class="form-horizontal form-groups-bordered validate" action='' method='POST'>						<div class="form-group">				<label for="field-1" class="col-sm-3 control-label">City Name</label>								<div class="col-sm-5">					<input type="text" name='cityName' class="form-control" data-validate="required" data-message-required="City Name Is Required." id="cityName" placeholder="City Name" <?php if(isset($_POST['cityName'])) echo "value='{$_POST['cityName']}'";?>>				</div>			</div>												<div class="form-group">				<div class="col-sm-offset-3 col-sm-5">									<button type="submit" id='addcitySubmit' name='addcitySubmit' class="btn btn-green btn-icon icon-left"><i class="entypo-check"></i>Save</button>											<a href="<?php echo  $this->config->base_url();?>admin/index/cityList">						<button type="button"class="btn btn-red btn-icon icon-left"><i class="entypo-cancel"></i>Cancel</button>						</a>									</div>			</div>		</form>	</div></div>