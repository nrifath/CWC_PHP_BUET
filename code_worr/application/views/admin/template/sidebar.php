<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="dashboard">
					<img src="<?php echo  $this->config->base_url()?>assets/front_end/images/logo.jpg" width="120" alt="" />
				</a>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				<div class="sidebar-user-info">
			
			<div class="sui-normal">
				<a href="editProfile" class="user-link">
					<span>Welcome, Admin</span>
					
				</a>
			</div>
			
		</div>
					
				
		
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- Search Bar -->
			
			<li class="propertyMainMenu">
				<a href="">
					<i class="entypo-home"></i>
					<span>Property</span>
				</a>
				<ul>
					<li>
						<a href="propertyList">
							<i class="entypo-list"></i>
							<span>Property List</span>
						</a>
					</li>
				</ul>
			</li>
			<li  class="typeMainMenu">
				<a href="">
					<i class="entypo-list-add"></i>
					<span>Property Type</span>
				</a>
				<ul>
					<li class="typeListSubMenu">
						<a href="typeList">
							<i class="entypo-list"></i>
							<span>Type List</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="locationMainMenu">
				<a href="">
					<i class="entypo-list-add"></i>
					<span>City</span>
				</a>
				<ul>
					<li class="locationListSubMenu">
						<a href="cityList">
							<i class="entypo-list"></i>
							<span>City List</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="bookingMainMenu">
				<a href="">
					<i class="entypo-list-add"></i>
					<span>Booking</span>
				</a>
				<ul>
					<li class="bookingListSubmenu">
						<a href="activeBookingList">
							<i class="entypo-list"></i>
							<span>Active Booking List</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="contentMainMenu">
				<a href="">
					<i class="entypo-list-add"></i>
					<span>Contents</span>
				</a>
				<ul>
					<li class="homeSubMenu">
						<a href="editContentDetails?contentId=1">
							<i class="entypo-list"></i>
							<span>Home</span>
						</a>
					</li>
					<li class="aboutUsSubMenu">
						<a href="editContentDetails?contentId=2">
							<i class="entypo-list"></i>
							<span>About Us</span>
						</a>
					</li>
					<li class="contactUsSubMenu">
						<a href="editContentDetails?contentId=3">
							<i class="entypo-list"></i>
							<span>Contact Us</span>
						</a>
					</li>
					<li class="rateSubMenu">
						<a href="editContentDetails?contentId=4">
							<i class="entypo-list"></i>
							<span>Rates</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
				
	</div>	