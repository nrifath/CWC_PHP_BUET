

<a style="color: #fff;" href='addMedia?propertyId=<?php echo (int)$_GET['propertyId']?>'><button type="button" class="btn btn-green"><i class="entypo-plus"></i>Add new Image</button></a>

<br>
<br>


<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Property Media List</h2>
		</div>
	</div>
	
	<div class='panel-body'>
	
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Preview</th>
					<th>Make Featured Thumbnail</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					$uploadDirectory = $this->config->base_url() . "uploads/";
					foreach($imageList as $anImage){
						echo "<tr>";
							echo "<td>
								<article class='image-thumb'>
									<a href='#'' class='image'>
										<img height='100px;' src='{$uploadDirectory}{$anImage['url']}' />
									</a>									
								</article>
							</td>";
							echo "<td>
								<a href='setFeaturedImage?propertyId={$_GET['propertyId']}&imageId={$anImage['media_id']}'>
									<button type='button' class='btn btn-success'>
										<i class='entypo-check'></i>
									</button>
								</a>	
							</td>";
							echo "<td>
								<a href='deleteMedia?mediaId={$anImage['media_id']}' class='btn btn-red btn-sm btn-icon icon-left deleteButton'><i class='entypo-cancel'></i>Delete</a>
							</td>";
						echo "</tr>";
					}
				?>
				
			</tbody>
			<tfoot>
				<tr>
					<th>Preview</th>
					<th>Make Featured Thumbnail</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>	





<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>

<br />

<script type='text/javascript'>
	$(document).ready(function(){
		$(".deleteButton").click(function(){
			return confirm("Are you sure to delete the item?");
		});
	});
</script>



<link rel="stylesheet" href="<?php echo  $this->config->base_url()?>assets/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="<?php echo  $this->config->base_url()?>assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo  $this->config->base_url()?>assets/js/select2/select2.css">