<script type="text/javascript">
	$(document).ready(function(){
		/////////// menu handling////////////////////////////
		$('.bookingMainMenu').addClass("opened");
		$('.bookingListSubmenu').addClass("active");
		/////////////////////////////////////////////////////
	});
</script>


<br>
<br>


<div class='panel panel-primary' data-collapsed="0">
	<div class='panel-heading'>
		<div class='panel-title'>
			<h2>Active Booking List</h2>
		</div>
	</div>
	
	<div class='panel-body'>
	
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Property Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Days</th>
					<th>Number of person to stay</th>
					<th>User Email</th>
					<th>User Contact Number</th>
					<th>Action</th></th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					foreach($activeBookingList as $aBooking){
						$diff = strtotime($aBooking['end_date']) - strtotime($aBooking['start_date']);
						$diffDay = floor($diff/(3600*24)) + 1;
						echo "<tr>";
							echo "<td>{$aBooking['property_title']}</td>";
							echo "<td>{$aBooking['start_date']}</td>";
							echo "<td>{$aBooking['end_date']}</td>";
							echo "<td>{$diffDay}</td>";
							echo "<td>{$aBooking['no_of_person_to_stay']}</td>";
							echo "<td>{$aBooking['client_email']}</td>";
							echo "<td>{$aBooking['client_contact_number']}</td>";
							echo "<td>
								<a href='editBooking?bookingDetailsId={$aBooking['booking_details_id']}' class='btn btn-default btn-sm btn-icon icon-left'><i class='entypo-pencil'></i>Edit</a>
								<a href='deleteBooking?bookingDetailsId={$aBooking['booking_details_id']}' class='btn btn-red btn-sm btn-icon icon-left deleteButton'><i class='entypo-cancel'></i>Delete</a>
							</td>";
						echo "</tr>";
					}
				?>
				
			</tbody>
			<tfoot>
				<tr>
					<th>Property Title</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Days</th>
					<th>Number of person to stay</th>
					<th>User Email</th>
					<th>User Contact Number</th>
					<th>Action</th></th>
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