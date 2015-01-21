<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<h1><?php echo date("Y-d-m");?></h1>
			<h3>Welcome to the site <strong>Property Rental</strong></h3>
		</div>
	</div>
</div>

<div class="row">
	
	<div class="col-sm-3">
		
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $propertyNumber;?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3>Registered Property</h3>
			<p>so far listed in our website our website.</p>
		</div>
		
	</div>
	
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-acqua">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $totalType;?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>Property type</h3></h3>
			<p>so far enlisted</p>
		</div>
		
	</div>
	
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $totalLocation;?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>Property Location</h3>
			<p>so far added over here.</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $totalActiveBooking;?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3>Active booking</h3>
			<p>so far registered in our website</p>
		</div>
		
	</div>
	
</div>






<div class="row">
	<div class="col-sm-12">
				
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-title">Latest Property</div>
				
				<div class="panel-options">
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Number of Bedroom</th>
						<th>Expense</th>
					</tr>
				</thead>
				
				<tbody>
					
					<?php
						foreach($propertyList as $aProperty){
							echo "<tr>";
								echo "<td>{$aProperty['property_id']}</td>";
								echo "<td>{$aProperty['property_title']}</td>";
								echo "<td>{$aProperty['bedroom']}</td>";
								echo "<td>{$aProperty['expense']}</td>";
							echo "</tr>";
						}
					?>
					

				</tbody>
			</table>
		</div>
		
	</div>
</div>