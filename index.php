<!DOCTYPE html>
<html>
	<head>
		<title>Holton Street</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<!---- CSS ------->
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/dark-hive/jquery-ui.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">	
		
	</head>
	<body>
	
	<div class="container"><!--Start of container-->
	
		<div class="row">
			<div class="span12"> 
				<h1><a href="index.php"><img alt="Holton Street Autobody" src="img/logo.gif"></a>
				<a id="login" class="btn btn-info btn-small" href="portal.php">
					Login
				</a>				
				
				</h1>
			</div>
		</div>
			
			<div class="navbar navbar-inverse"><!--Start of Navbar-->
				<div class="navbar-inner">
					<div class="container">
			 
						<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
			 
							<!-- Everything you want hidden at 940px or less, place within here -->
						<div class="nav-collapse collapse">
							<!-- .nav, .navbar-search, .navbar-form, etc -->
							<ul class="nav">
								<li class="active"><a href="#">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="insurance.php">Insurance</a></li>
								<li><a href="testimonials.php">Testimonials</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Water Transfer Process
										<b class="caret"></b>
									</a>
									
									<ul class="dropdown-menu">
										<li><a href="wtAbout.php">About</a></li>
										<li><a href="wtPatterns.php">Patterns</a></li>
									</ul>
								</li>
								<li><a href="portal.php">Portal</a></li>
					
							</ul>
						</div>
			 
					</div>
				</div>
			</div><!--End of Navbar-->
		
		
			<div class="hero-unit"><!--Start of Hero-->
				<h1>The Collision Cure</h1>
				<p>
					Providing exceptional customer service is our goal. 
				</p>
			</div><!--End of Hero-->
		
		<div id="home" class="row">
			<div class="span4"><!--1st Span 4-->
				<span class="span-margin">
					<h3> Holton Street </h3>
					<p>We minimize our customer's inconvenience after a collision by assisting with any repair related details. Whether you own a Car, Truck, or SUV our experienced collision center can make it look new again.
					</p>
					<p>
						Services offered:
					</p>
					
					<ul>
						<li>Expert collision repair</li>
						<li>Arrangements for vehicle pick up</li>
						<li>Assistance with car rentals</li>
						<li>Guidance with insurance claims</li>
						<li>All major insurances accepted</li>
					</ul>
					
					<a class="btn btn-primary btn-small bottom" href="insurance.php">
						Claim Tips
					</a>
				</span>	
			</div><!--end 1st span4-->
	
	        <div class="span4"><!--2nd Span 4-->
				<span class="span-margin">
					<h3>Commitment to Quality</h3>
					<p>We deal with each individual customer's needs and strive to exceed their expectations. We use the highest quality parts and materials available and provide superior workmanship through highly trained technicians. We mix our own paint on site to ensure a perfect color match.
					</p>
					
					<ul>
					<li>A.S.E. Certified</li>
					<li>I-CAR Trained</li>
					</ul>
					
					<a class="btn btn-primary btn-small bottom" href="testimonials.php">
						Testimonials 	
					</a>	
				</span>						
	       </div><!--end 2nd span4-->
       
       
	        <div class="span4">
	        	<span class="span-margin">
					<h3> Water Transfer Printing</h3>
					<p>We offer the latest technology in Water Transfer Printing to customize your Car, Motorcycle, Boat, Firearms and more.
					</p>
					<p>
						Nearly 300 patterns to choose from including:
					</p>
					
					<ul>
						<li>Camouflage</li>
						<li>Carbon Fiber</li>
						<li>Designer</li>
						<li>Metal</li>
						<li>Stone</li>
						<li>Wood Grain</li>
					</ul>
					
					
					<a class="btn btn-primary btn-small bottom" href="wtPatterns.php">
						Patterns
					</a>	
				</span>	
			</div><!--end span4-->
		</div><!--end Rows-->
		
		<div class="navbar navbar-static-bottom">
		<a href="http://www.refinedDesigns.net">
			Refined Designs	&copy; <? echo date("Y"); ?> <!-- Yay php auto updates my year-->
		</a>
		</div>
	</div><!--End of container-->
	
	
		
		<!---- JS ------->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>	
		<script> 
		//script will detect screen size then change buttons accordingly good for mobile/ipad
		//made by Kevin Reynolds at http://www.RefinedDesigns.net
		$(function () {
			
			var btn = $('a.btn-primary');//target btn(s)
			var size = 980; //because im using a static # i can just use a var
					
			$(window).resize(function() {//check for window size using resize
			
				if ( $(window).width() < size) { //if smaller than 767 px make buttons large
					btn.removeClass('btn-small');
					btn.addClass('btn-large');
					
					
				}
				if ($(window).width() > size){ // if larger than 767 make buttons small
					btn.removeClass('btn-large');
					btn.addClass('btn-small');
	   			}	
   			});//end resize
		});//end script
		</script>
	</body>
</html>
