<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Adidas Website Template | Shop :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo  $this->config->base_url()?>assets/front_end/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo  $this->config->base_url()?>assets/front_end/css/custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo  $this->config->base_url()?>assets/front_end/css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/jquery.min.js"></script>
<script src="<?php echo  $this->config->base_url()?>assets/front_end/js/jquery.easydropdown.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="<?php echo  $this->config->base_url()?>assets/front_end/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!-- top scrolling -->
<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo  $this->config->base_url()?>assets/front_end/js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>		
</head>
<body>
  <div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<a href=""><img src="<?php echo  $this->config->base_url()?>assets/front_end/images/logo.png" alt=""/></a>
	    </div>
	    <div class="cssmenu">
		   <ul>
		   	 <?php
			 	if(!isset($_SESSION['code_warrior_user_id'])){
					echo "<li class=''><a href='registration'>Sign up</a></li>";
				}
			 ?>
			 <li><a href="">Store Locator</a></li>
			 <?php
			 	if(isset($_SESSION['code_warrior_user_id'])){
					echo "<li><a href='profile'>My Account</a></li> ";
				}else{
					echo "<li><a href='login'>Login</a></li> ";
				}
			 ?>
			 <li><a href="">CheckOut</a></li>
			 <?php
			 	if(isset($_SESSION['code_warrior_user_id'])){
					echo "<li><a href='logout'>Logout</a></li> ";
				}
			 ?> 
		   </ul>
		</div>
		<ul class="icon2 sub-icon2 profile_img">
			<li><a class="active-icon c2" href="#"> </a>
				<ul class="sub-icon2 list">
					<li><h3>Products</h3><a href=""></a></li>
					<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
				</ul>
			</li>
		</ul>
		<div class="clear"></div>
 	</div>
   </div>
   <div class="header-bottom">
   	<div class="wrap">
   		<!-- start header menu -->
		<ul class="megamenu skyblue">
		    <li><a class="color1" href="#">Home</a></li>
			<li class="grid"><a class="color2" href="#">Men</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">login</a></li>
								</ul>	
							</div>
							<div class="h_nav">
								<h4 class="top">men</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>style zone</h4>
								<ul>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<img src="images/nav_img.jpg" alt=""/>
					</div>
				</div>
				</li>
  			   <li class="active grid"><a class="color4" href="#">Women</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="">login</a></li>
									<li><a href="">create an account</a></li>
									<li><a href="">create wishlist</a></li>
									<li><a href="">my shopping bag</a></li>
									<li><a href="">brands</a></li>
									<li><a href="">create wishlist</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
						 <div class="h_nav">
						   <img src="images/nav_img1.jpg" alt=""/>
						 </div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
					</div>
    			</li>				
				<li><a class="color5" href="#">Kids</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">login</a></li>
								</ul>	
							</div>
							<div class="h_nav">
								<h4 class="top">man</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>style zone</h4>
								<ul>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<img src="images/nav_img2.jpg" alt=""/>
					</div>
				</div>
				</li>
				<li><a class="color6" href="#">Sale</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>	
							<div class="h_nav">
								<h4 class="top">my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>man</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="">login</a></li>
									<li><a href="">create an account</a></li>
									<li><a href="">create wishlist</a></li>
									<li><a href="">my shopping bag</a></li>
									<li><a href="">brands</a></li>
									<li><a href="">create wishlist</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
				</div>
				</li>
				<li><a class="color7" href="#">Customize</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="">login</a></li>
									<li><a href="">create an account</a></li>
									<li><a href="">create wishlist</a></li>
									<li><a href="">my shopping bag</a></li>
									<li><a href="">brands</a></li>
									<li><a href="">create wishlist</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>
				<li><a class="color8" href="#">Shop</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>style zone</h4>
								<ul>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">login</a></li>
								</ul>	
							</div>
							<div class="h_nav">
								<h4 class="top">man</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
				</div>
				</li>
				<li><a class="color9" href="#">Football</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4>shop</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">brands</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>help</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>							
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="">login</a></li>
									<li><a href="">create an account</a></li>
									<li><a href="">create wishlist</a></li>
									<li><a href="">my shopping bag</a></li>
									<li><a href="">brands</a></li>
									<li><a href="">create wishlist</a></li>
								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>my company</h4>
								<ul>
									<li><a href="">trends</a></li>
									<li><a href="">sale</a></li>
									<li><a href="">style videos</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>popular</h4>
								<ul>
									<li><a href="">new arrivals</a></li>
									<li><a href="">men</a></li>
									<li><a href="">women</a></li>
									<li><a href="">accessories</a></li>
									<li><a href="">kids</a></li>
									<li><a href="">style videos</a></li>
								</ul>	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>
				<li><a class="color10" href="#">Running</a></li>
				<li><a class="color11" href="#">Originals</a></li>
				<li><a class="color12" href="#">Basketball</a></li>
		   </ul>
		   <div class="clear"></div>
     	</div>
       </div>