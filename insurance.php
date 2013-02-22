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
				<h1><a href="index.php"><img alt="Holton Street Autobody" src="img/logo.gif"></a></h1>
				<a id="login" class="btn btn-info btn-small bottom pull-right" href="portal.php">
					Login
				</a>
			</div>
		</div>
			
			<div class="navbar"><!--Start of Navbar-->
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
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li class="active"><a href="insurance.php">Insurance</a></li>
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
		
	
		
		<div id="insurance" class="row">
			<div class="span8"><!--span8-->
				<span class="span-margin">
					<h2> Insurance</h2>
					<p>
					Here at Holton Street Autobody we understand our customer is you. We also understand that your insurance company has a hand in the repair on your vehicle. That is why we have worked to forge lasting relationships with all of the insurance companies and appraisers we have worked with over the years. 
					</p>
					
					<p>
						<b>All major Insurance companies accepted!</b>
					</p>
					
					
					<p>
						In the state of Massachusetts, the customer has the right to have their vehicle repaired at the facility of their choice.	
					</p>
					
					<h2>Accident Tips </h2>
					<h3>So you've been in an accident?</h3>

					<p>
						We are sorry you have been involved in an accident. We certainly hope everyone is all right and we are here to assist you. But what do YOU have to do? Just follow the instructions listed below. We will assume you have gotten the information from the other party if one was involved.
					</p>
					
					<ol>
						<li>
						Call your Insurance Company. In most cases calling your company instead of your agent will work out best. They will ask for a description of what happened. Your insurance company will assign an appraiser or ask you to take your vehicle to one of there "drive in" locations. Choose what is most convenient for you. You can also ask your appraiser to e-mail or fax the appraisal to us and you.
						Email: holtonstreetautobody@comcast.net
						Fax #: 978-458-6029
						</li>
						
						<li>
						Call us at 978-458-6000. We can arrange for the appraiser to inspect your vehicle at our facility or make a tentative appointment for you to bring your car in for repair. If your vehicle can not be driven, we will fit you in immediately. If your car was towed from the accident we can arrange for pick up and take care of the expenses inccurred by the tow company.
						</li>
						
						<li>
						Once you have the appraisal, if we have not received a copy, you can fax or e-mail it to us or bring it by. We will set up your appointment, order your parts and get ready for your repair.
						</li>
						
						<li>If the damages are over $1000.00, or if there was personal injury, you will need to fill out an accident report. You can find it here
						http://www.mass.gov/rmv/forms/accident.htm
						</li>
						
						<li>Once your vehicle is here we will take care of the rest. We will complete the repairs, call your appraiser for any additional damages, keep you, your rental company and insurance company up to date with the repair process and get you back into your vehicle as soon as possible.
						</li>
					</ol>					
				</span>
			</div><!--end span8-->
			
			<div class="span4"><!--span8-->
				<span class="span-margin">
					<h3>Insurance</h3>
					<ul class="unstyled">
						<li>AMICA<span class="text-error">*</span></li>
						<li>Commerce Insurance<span class="text-error">*</span></li>
						<li>Hanover<span class="text-error">*</span></li>
						<li>Liberty Mutual<span class="text-error">**</span></li>
						<li>Met Life Auto and Home<span class="text-error">***</span></li>
						<li>Safety Insurance<span class="text-error">*</span></li>
						<li>Arbella</li>
						<li>GEICO</li>
						<li>National Grange</li>
						<li>One Beacon</li>
						<li>Progressive</li>
						<li>State Farm</li>
						<li>Travelers of Massachusetts</li>
						<li>USAA</li>
						<li>Vermont Mutual</li>
						<br />


						<li class="text-error">*Preferred Shop</li>
						<li class="text-error">**Superior Service Program</li>
						<li class="text-error">***Concierge/CARE program</li>
					</ul>
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
	</body>
</html>
