<?php 

require 'db.php';

?>	
			<div class="navbar navbar-inverse"><!--Start of Navbar-->
			
				<h1>
					<a href="../index.php"><img alt="Holton Street Autobody" src="../img/logo.gif" class="header">
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
							<!-- .nav, .navbar-search, .navbar-form, etc -->
							<a id="login" class="btn btn-danger btn-small pull-right" href="logout.php">
								Logout
							</a>	
							<ul class="nav">
								<li><a href="../index.php">Home</a></li>
								<li><a href="../about.php">About</a></li>
								<li><a href="../insurance.php">Insurance</a></li>
								<li><a href="../testimonials.php">Testimonials</a></li>
								<li class="dropdown navsplit">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										Water Transfer Process
										<b class="caret"></b>
									</a>
									
									<ul class="dropdown-menu">
										<li><a href="../wtAbout.php">About</a></li>
										<li><a href="../wtPatterns.php">Patterns</a></li>
									</ul>
								</li>
								<li class="active"><a href="portal.php">Portal</a></li>
					
							</ul>
						</div>
			 
					</div>
				</div>
			</div><!--End of Navbar-->
		
	
		
		<div id="portal2" class="row"><!--start Row1-->
			<div class="span12"><!--span12-->
				<div class="row"><!--start Row2-->
					<div class="span3"><!--start span3-->
						<span class="span-margin">
							<h2>Portal</h2>
							<h4>Hello, <?php echo htmlentities($data['fullname']);?></h4>
						</span>
						
						<ul class="nav nav-pills nav-stacked">
							<?php
								$uId = $data['id']; //uid = to the users id on login
							 
								$statement = $db->prepare("
									select group_Id, user_Id, group_Name FROM groups WHERE user_Id = '$uId'
								");
								try {
									if ($statement->execute()) {
										$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
									}
								}
								catch(PDOException $e){
									echo "Query Failed";
								}
										
										//function to get the last number after = in the url						
										function activateLink($var){
																				
										//get id in link
										$url=$_SERVER['REQUEST_URI'];										
										$end = end((explode('=', $url)));
										
											if($end==$var) {
												return ' class="active"';
											}
										}
										
								//Project Links		
								if (is_array($rows)){
									foreach ($rows as $num => $row){
																		
										echo (
											'<li'
											. activateLink($num+1)
											.'>' 
											. '<a href="index.php?id='
											. $row['group_Id'] 
											. '">'
											. $row['group_Name']   
											.'</a></li>'
																		 

										);							    
									} 
								}				
								unset($rows);
							?>
							
						</ul>
					</div><!--end span3-->
					
					<?php

						  
					?>
					
					<div class="span9"><!--start span8-->
						<div id="tabs">
						  <ul>
							  <?php
								//getid
								$id = $_GET['id'];
								//prepare
								$statement2 = $db->prepare("
									SELECT project_Id, project_Name, projects_GroupId, project_Date,project_Text, projects_Picture1, projects_Picture2, projects_Picture1HD, projects_Picture2HD FROM projects WHERE projects_GroupId = '$id'
								");
								
								//error
								try {
									if ($statement2->execute()) {
										$rows2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
									}
								}
								catch(PDOException $e){
									echo "Query Failed";
								}
							  
								//makes sure you use a number in the id
								if (!is_numeric($id)){
									echo('Select a project.');
								}else{
								
								//put a table out there with all the info you got from the id
									if (is_array($rows2)){
										foreach ($rows2 as $num => $row){
										   
										   echo (
										   '<li><a href="#tabs-'.$num.'">'.$row['project_Date'].'</a></li>'
										   );
										}
									}		
								}
							  ?>
						  </ul>
						  
						  	<?php


							  
								//makes sure you use a number in the id
								if (!is_numeric($id)){
									
								}else{
								
								//put a table out there with all the info you got from the id
									if (is_array($rows2)){
										foreach ($rows2 as $num => $row){
										   
										   echo (
										   '<div id="tabs-'.$num.'">'
										   .'<h2>'.$row['project_Name'].'</h2>'
										   .'<div id="portal-pics">'
.'<a href="'.$row['projects_Picture1HD'].'" rel="prettyPhoto"><img src="'.$row['projects_Picture1'].'" alt="Picture '.($num+1).'"></a>'	
										   	
.'<a href="'.$row['projects_Picture2HD'].'" rel="prettyPhoto"><img src="'.$row['projects_Picture2'].'" alt="Picture '.($num+1).'"></a>'		
										   									   						   
				   						   .'</div>'
										   
										   .$row['project_Text'].'</div>'
										   
										   
										   );
										   
										}
									}		
								}
								unset($rows2);


							  ?>
							 
							  


					</div><!--end span8-->
				</div><!--end Row2-->
			</div><!--end span12-->
		</div><!--end Row1-->