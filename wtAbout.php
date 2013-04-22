<?php include_once("analyticstracking.php") ?>
<?php include_once("db.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Holton Street</title>
		<link rel="icon" type="image/png" href="img/favicon.ico">		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<!---- CSS ------->
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/dark-hive/jquery-ui.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/global.css" type="text/css" media="screen">	
		<link rel="stylesheet" href="css/bootstrap-lightbox.min.css" type="text/css" media="screen">
		<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
	</head>
	<body>
	
		<div class="container"><!--Start of container-->
	
			<div class="navbar navbar-inverse"><!--Start of Navbar-->
			
				<h1>
					<a href="index.php"><img alt="Holton Street Autobody" src="img/logo.gif" class="header">
					</a>			
				</h1>

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
							<a id="login" class="btn btn-info btn-small pull-right" href="portal/">
								Login
							</a>	
							<!-- .nav, .navbar-search, .navbar-form, etc -->
							<ul class="nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
								<li><a href="insurance.php">Insurance</a></li>
								<li><a href="testimonials.php">Testimonials</a></li>
								<li class="dropdown active navsplit">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Water Transfer Process
										<b class="caret"></b>
									</a>
									
									<ul class="dropdown-menu">
										<li class="active"><a href="wtAbout.php">About</a></li>
										<li><a href="wtPatterns.php">Patterns</a></li>
									</ul>
								</li>
								<li><a href="portal/">Portal</a></li>
					
							</ul>
						</div>
			 
					</div>
				</div>
			</div><!--End of Navbar-->
		
	
		
		<div id="wtAbout" class="row">
			<div class="span8"><!--span8-->
				<span class="span-margin">
									<?php 
					//content
					$sqlAbout = $db->query('SELECT id, text FROM content');
					
					try {
						if ($sqlAbout->execute()) {
							$Aboutresults = $sqlAbout->fetchAll(PDO::FETCH_OBJ);
						}
					}
						catch(PDOException $e){
							echo "Query Failed - content";
					}
					?>
						<?php foreach($Aboutresults as $Aentry): ?>	
							<?php if ($Aentry->id == 7){
							echo (
								'<td>'
								 .$Aentry->text
								 .'</td>'
							);
							} 
								
								
							?>
					<?php endforeach; ?>
				</span>					
			</div><!--end span8-->
			
			<div class="span4"><!--span8-->
				<span class="span-margin">
					<?php								
						$sql = $db->query('SELECT id, text ,picture,picture_HD FROM pictures_About');
						
						try {
							if ($sql->execute()) {
								$results = $sql->fetchAll(PDO::FETCH_OBJ);
							}
						}
							catch(PDOException $e){
								echo "Query Failed - content";
						}
						
							
					?>
					<h2>Pictures</h2>
					<p class="white-text">Examples of the water transfer process:</p>
					<ul>
						<?php foreach($results as $entry): ?>
						<li class="pull-left">
							<a href="<?php echo $entry->picture_HD; ?>" rel="prettyPhoto[pp_gal]">
								<img src="<?php echo $entry->picture; ?>" alt="<?php echo $entry->text; ?>">										
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php unset ($Aboutresults); ?>



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
		<script type="text/javascript" src="js/jquery.center.js"></script>	
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		
		<script>
		// Controller for jquery.center.js 
			$(function () {
				

				$(".navbar h1").center({
					vertical: false // only hoz
				});
				
 
				$("a[rel^='prettyPhoto']").prettyPhoto({
					allow_resize: false,
					theme: 'dark_rounded' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
				});

			
	   		});//end script	
		</script>
	</body>
</html>
