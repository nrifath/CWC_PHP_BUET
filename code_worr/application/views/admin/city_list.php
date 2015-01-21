<script type="text/javascript">
	$(document).ready(function(){
		/////////// menu handling////////////////////////////
		$('.locationMainMenu').addClass("opened");
		$('.locationListSubMenu').addClass("active");
		/////////////////////////////////////////////////////
	});
</script>

<a style="color: #fff;" href='addCity'><button type="button" class="btn btn-green"><i class="entypo-plus"></i>Add new City</button></a>

<br>
<br>


<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Property City List</h2>
		</div>
	</div>
	
	<div class='panel-body'>
	
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					foreach($cityList as $aCity){
						echo "<tr>";
							echo "<td>{$aCity['city_name']}</td>";
							echo "<td>
								<a href='editCity?cityId={$aCity['city_id']}' class='btn btn-default btn-sm btn-icon icon-left'><i class='entypo-pencil'></i>Edit</a>
								<a href='deleteCity?cityId={$aCity['city_id']}' class='btn btn-red btn-sm btn-icon icon-left deleteButton'><i class='entypo-cancel'></i>Delete</a>
							</td>";
						echo "</tr>";
					}
				?>
				
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
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