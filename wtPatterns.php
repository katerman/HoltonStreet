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
										<li><a href="wtAbout.php">About</a></li>
										<li class="active"><a href="wtPatterns.php">Patterns</a></li>
									</ul>
								</li>
								<li><a href="portal/">Portal</a></li>
					
							</ul>
						</div>
			 
					</div>
				</div>
			</div><!--End of Navbar-->
		
 
			<?php 
				$sql_picturePatterns = $db->query('SELECT id, text,picture,type FROM pictures_Patterns');
				
				try {
					if ($sql_picturePatterns->execute()) {
						$pic_PatternsResults = $sql_picturePatterns->fetchAll(PDO::FETCH_OBJ);
					}
				}
					catch(PDOException $e){
						echo "Query Failed - content";
				}
				
				
			?>
	
		
		<div id="wtPatterns" class="row">
			<div class="span12"><!--span8-->

				<h2> Water Transfer Process</h2>

					<div id="tabs">
						<ul>
							<li><a href="#tabs-1">Camouflage</a></li>
							<li><a href="#tabs-2">Carbon Fiber</a></li>
							<li><a href="#tabs-3">Designer</a></li>
							<li><a href="#tabs-4">Metal</a></li>
							<li><a href="#tabs-5">Stone</a></li>
							<li><a href="#tabs-6">Wood Grain</a></li>
							<li><a href="#tabs-7">Skulls</a></li>
						</ul>
						
						<div id="tabs-1" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 1){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>											
						</div>
						
						<div id="tabs-2" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 2){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>
						</div>
						
						<div id="tabs-3" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 3){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>
						</div>

						<div id="tabs-4" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 4){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>
						</div>
						
						<div id="tabs-5" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 5){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>	
						</div>
						
						<div id="tabs-6" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 6){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>
						</div>
						
						<div id="tabs-7" class="clearfix">
							<ul class="patterns">
									<?php foreach($pic_PatternsResults as $PPentry): ?>
									<?php
										if($PPentry->type == 7){
											echo '<li class="pull-left"><img src="'.$PPentry->picture .'" alt="'.$PPentry->text .'"><p>'.$PPentry->text.'</p></li>'
										;}
										
									?>
									<?php endforeach; ?>																							</ul>						
						</div>
						
					</div><!--end tabs-->
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
		<script type="text/javascript" src="js/bootstrap-lightbox.min.js"></script>
		<script type="text/javascript" src="js/jquery.center.js"></script>	
		<script>
		// Controller for jquery.center.js 
			$(function () {
				

				$(".navbar h1").center({
					vertical: false // only hoz
				});
			
	   		});//end script	
		</script>
		
		<script>
		//lets make some tabs
			$(function () {
				$('#tabs').tabs();
			});
		</script>
	</body>
</html>
