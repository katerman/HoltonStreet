<?php 

print ($_POST['inputEmail']);

if (isset($_POST['submit'])) {

	$username = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];

if ($username == "kevin" && $password == "password") {

header( 'Location: http://refineddesigns.net/proto/portal2.php' ) ;	

}
else {

	print ("Wrong Email/Password");

}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Holton Street</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<!---- CSS ------->
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/dark-hive/jquery-ui.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">	
		<link rel="stylesheet" href="css/bootstrap-lightbox.min.css" type="text/css" media="screen">
	</head>
	<body>
	
	<div class="container"><!--Start of container-->
	
		<div class="row">
			<div class="span12"> 
				<h1><a href="index.php"><img alt="Holton Street Autobody" src="img/logo.gif"></a>
				<a id="login" class="btn btn-info btn-small hidden" href="portal.php">
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
								<li class="active"><a href="portal.php">Portal</a></li>
					
							</ul>
						</div>
			 
					</div>
				</div>
			</div><!--End of Navbar-->
		
	
		
		<div id="portal" class="row">
			<div class="span6"><!--span6-->
				<span class="span-margin">
				<h2>The Portal</h2>
				
				<p> Imagine yourself being able to log in after choosing Holton Street Autbody, and seeing exactly how far your car or other project is coming along, with Holton Street's Portal you can!</p>
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</span>					
			</div><!--end span6-->
			
			<div class="span6"><!--span6-->
				<span class="span-margin">
					<h3>Login</h3>
				
					
					<form method="post" action="#" class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
								<input type="text" id="inputEmail" name="inputEmail" placeholder="Email">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
								<input type="password" id="inputPassword" name="inputPassword" placeholder="Password">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls">
								<button name="submit" type="submit" class="btn btn-info">Sign in</button>
							</div>
						</div>
					</form>
					
					<p>
					Login Illusion to do this illusion type in kevin/password.
					</p>
					
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

				</span>
			</div><!--end span6-->
		</div><!--end Rows-->
		
		<div class="navbar navbar-static-bottom">
		<a href="http://www.refinedDesigns.net">
			Refined Designs	&copy; <? echo date("Y"); ?> <!-- Yay php auto updates my year-->
		</a>
		</div>
	</div><!--End of container-->

	
		</
		<!---- JS ------->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>		
		<script type="text/javascript" src="js/bootstrap-lightbox.min.js"></script>
	</body>
</html>
