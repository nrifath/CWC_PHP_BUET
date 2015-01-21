<script type="text/javascript">
	$(document).ready(function(){
		/////////// menu handling////////////////////////////
		$('.propertyMainMenu').addClass("opened");
		$('.propertyList').addClass("active");
		/////////////////////////////////////////////////////
	});
</script>

<a style="color: #fff;" href='addProperty'><button type="button" class="btn btn-green"><i class="entypo-plus"></i>Add New Property</button></a>

<br>
<br>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Name</th>
			<th>Bedroom</th>
			<th>Maximum Guest</th>
			<th>Expense(Per night)</th>
			<th>Status</th>
			<th>Album</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		<?php
			$statusMap = array();
			$statusMap[0] = "Draft";
			$statusMap[1] = "Published";
			foreach($propertyList as $aProperty){
				echo "<tr>";
					echo "<td>{$aProperty['property_title']}</td>";
					echo "<td>{$aProperty['bedroom']}</td>";
					echo "<td>{$aProperty['max_guest']}</td>";
					echo "<td>{$aProperty['expense']}</td>";
					echo "<td>{$statusMap[$aProperty['status']]}</td>";
					echo "<td><a target='_blank' href='showAlbum?propertyId={$aProperty['property_id']}'><button class='btn btn-info'><i class='entypo-picture'></i>Show Album</button></a></td>";
					echo "<td>
						<a href='editProperty?propertyId={$aProperty['property_id']}' class='btn btn-default btn-sm btn-icon icon-left'><i class='entypo-pencil'></i>Edit</a>
						<a href='deleteProperty?propertyId={$aProperty['property_id']}' class='btn btn-red btn-sm btn-icon icon-left deleteButton'><i class='entypo-cancel'></i>Delete</a>
					</td>";
				echo "</tr>";
			}
		?>
		
	</tbody>
	<tfoot>
		<tr>
			<th>Name</th>
			<th>Bedroom</th>
			<th>Maximum Guest</th>
			<th>Expense(Per night)</th>
			<th>Status</th>
			<th>Album</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>






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