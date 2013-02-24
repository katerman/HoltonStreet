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
								<li><a href="index.php">Home</a></li>
								<li class="active"><a href="about.php">About</a></li>
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
		
	
		
		<div id="about" class="row">
			<div class="span8"><!--span8-->
				<span class="span-margin">
					<h2>About</h2>
					
					<p>
						Holton Street Auto Body, owned and operated by Carl Gizzi, has been in business for 40 years.
						Originally operated out of Woburn, MA, Holton Street Auto Body relocated to its current state of the art facility built in Dracut, MA in 2004.
					</p>
				
					
					<h2>Business Hours</h2>
					
					<ul class="unstyled">
						<li>Monday - Friday 8am - 6pm </li>
						<li>Saturday by appointment or chance</li>
						<li>Call for holiday hours 978-458-6000</li>
					</ul>
					
					<h2>Contact</h2>
					<address>
					  <strong>Holton Street AutoBody</strong><br>
						2125 Bridge Street (Route 38)<br/>
						Dracut, MA 01826<br/>
					  <abbr title="Phone">Phone:</abbr> 978-458-6000<br/>
  					  <abbr title="Fax">Fax:</abbr> 978-458-6029<br/>
  					  <abbr title="Email">Email:</abbr>holtonstreetautobody@comcast.net
					</address>	

				</span>
			</div><!--end span8-->
			
			<div class="span4"><!--span8-->
				<span class="span-margin">
					<h3>Community Support</h3>
					
					<table>
						<caption class="text-left"><b>We Proudly Support:</b></caption>
						<tbody>
							<tr>
								<td>Dracut Fire Fighters Local 2586</td>
								<td><img alt="Dracut Fire Picture" src="img/icons/dracutFire.gif"></td>
							</tr>
							<tr>
								<td>Dracut Police Association</td>
								<td><img alt="Dracut Police Picture" src="img/icons/dracutPolice.gif"></td>
							</tr>
							<tr>
								<td>Dracut All Sports Boosters</td>
								<td><img alt="Dracut Fire Picture" src="img/icons/middies.gif"></td>
							</tr>
							<tr>
								<td>Dracut High School Football</td>
								<td><img alt="Dracut Fire Picture" src="img/icons/dracutFootball.gif"></td>
							</tr>
							<tr>
								<td>Dracut Baseball</td>
								<td><img alt="Dracut Fire Picture" src="img/icons/dracutBa.gif"></td>
							</tr>
							<tr>
								<td>Dracut Girls Softball</td>
								<td><img alt="Dracut Fire Picture" src="img/icons/dracutSoftball.gif"></td>
							</tr>
						</tbody>
					</table>

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
