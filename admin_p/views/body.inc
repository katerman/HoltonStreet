<?php

require "db.php";

//users
$sql = $db->query('SELECT user_Id,user_uName, user_FullName, user_Access FROM users');

try {
	if ($sql->execute()) {
		$results = $sql->fetchAll(PDO::FETCH_OBJ);
	}
}
	catch(PDOException $e){
		echo "Query Failed - users";
}

//groups
$sqlGroups = $db->query('SELECT group_Id, group_Name, user_Id FROM groups');

try {
	if ($sqlGroups->execute()) {
		$GroupResults = $sqlGroups->fetchAll(PDO::FETCH_OBJ);	
	}
}

catch(PDOException $e){
	echo "Query Failed - groups";
}


//access inner join
$AccessJoin = $db->prepare("SELECT access.access_Name, access.access_Id FROM access INNER JOIN users ON access.access_Id=users.user_Access");

try {
	if ($AccessJoin->execute()) {
		$AcessRows = $AccessJoin->fetchAll(PDO::FETCH_ASSOC);
	}
}
catch(PDOException $e){
	echo "Query Failed - access join";
}

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

<div id="content"><!-- start content -->
<h1>Holton Street</h1>
<p>Welcome back, <?php echo htmlentities($data['fullname']);?>.</p>
<p><a class="logout" href="logout.php">Log out</a></p>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Users</a></li>
    <li><a href="#tabs-2">Projects</a></li>
    <li><a href="#tabs-3">Content</a></li>
  </ul>
  
	<div id="tabs-1"><!-- start of tabs #1-->
		<h2>Users</h2>
	
		<ul>
			<li class="create"><a href="add/addUser.php">Add new User</a></li>
		</ul>			     
				
			<div id="users" class="zebra">
				<table data-provide="pagination" data-pager="#pager">
					<thead>
						<tr>
							<th class="sort" data-sort="uId">User ID</th>
							<th class="sort" data-sort="name">UserName</th>
							<th class="sort" data-sort="fname">User FName</th>
							<th class="sort" data-sort="access">User Access</th>
							<th>Actions</th>
							<th colspan="2">
							    <input type="text" class="search" placeholder="Search" />
							</th>
						</tr>
					</thead>
					
					<tbody class="list">
						<?php foreach($results as $num => $entry): ?>
						<tr>
							<td class="uId"><?php echo $entry->user_Id; ?></td>
							<td class="name"><?php echo $entry->user_uName; ?></td>
							<td class="fname"><?php echo $entry->user_FullName; ?></td>
							<td class="access"><?php echo $AcessRows[$num]['access_Name']?></td>
							<td><a class="edit" href="edit/editUser.php?id=<?php echo $entry->user_Id; ?>">Edit</a> <a class="delete" href="delete/deleteUser.php?id=<?php echo $entry->user_Id; ?>">Delete</a></td>
						</tr>
						<?php endforeach; ?>
						<?php unset($results); ?>
					</tbody>
					<tfoot>
						<div class="pagination pagination-small" id="pager"></div>
					</tfoot>
				</table>	
			</div>
			
	</div><!-- end of tabs #1-->
  
	<div id="tabs-2"><!-- start of tabs #2-->
		<h2> Project Groups, and Updates </h2>
		<ul>
			<li class="create"><a href="add/addGroup.php">Add new Project Group</a></li>
		</ul>		
			

	
		<div id="groups" class="zebra">
			<table data-provide="pagination" data-pager="#pager2">
				<thead>
					<tr>
						<th class="sort" data-sort="gName">Group Name</th>
						<th class="sort" data-sort="gId">Group ID</th>
						<th class="sort" data-sort="uId">User ID</th>
			            <th># of Updates</th>
						<th>Actions</th>
						<th colspan="2">
						    <input type="text" class="search" placeholder="Search" />
						</th>
					</tr>
				</thead>
				<?php 
				//Function needed to check if the group has 0 updates
				function is_array_empty($a){
					foreach($a as $key => $Pentry)
						if(!empty($Pentry)) return false;
					return true;
				}
				
				?>
				
				<tbody class="list">
				<?php foreach($GroupResults as $num => $Gentry): ?>	
		        <tr>
		            <td class="gName"><?php echo $Gentry->group_Name; ?></td>
		            <td class="gId"><?php echo $Gentry->group_Id; ?></td>
		            <td class="uId"><?php echo $Gentry->user_Id; ?></td>
		            <td>
			        <?
						$sqlProject = $db->query("SELECT projects_GroupId FROM projects WHERE projects_GroupId = '$Gentry->group_Id' ");			
						$ProjectResults = $sqlProject->fetchAll(PDO::FETCH_OBJ);			        

						//loops through each project result for an amount of updates
						foreach($ProjectResults as $key => $Prentry){
							
						}

						if (is_array_empty($ProjectResults)){
						echo '0';
						}else{
						echo $key + 1 ;
						}
						
			        ?>  
			        
			        <?php unset($Pentry); ?>  
		            </td>
		            <td>
						<a class="edit" href="edit/editGroup.php?id=<?php echo $Gentry->group_Id; ?>">Edit/Add</a>
						<a class="delete" href="delete/deleteGroup.php?id=<?php echo $Gentry->group_Id; ?>">Delete</a>
					</td>
		        </tr>
		        <?php endforeach; ?>
		        <?php unset($Gentry) ?>	
				</tbody>
				<tfoot>
					<div class="pagination pagination-small" id="pager2"></div>
				</tfoot>
			</table>
		</div>
	</div><!-- end of tabs #2-->
  
  
	<div id="tabs-3"><!-- start of tabs #3-->
		<div id="tabs-bottom" class="tabs-bottom">
			<ul>
				<li><a href="#tabs-a">About</a></li>
				<li><a href="#tabs-b">Testimonials</a></li>
				<li><a href="#tabs-c">Insurance</a></li>
				<li><a href="#tabs-d">wt About</a></li>
				<li><a href="#tabs-e">wt Patterns</a></li>   
			</ul>
			
			<div id="tabs-a">
				<table class="table-pos">
					<thead>
						<th>Left Side Content</th>			  		
						<th>Right Side Content</th>
					</thead>
					<tbody>

						<?php foreach($Aboutresults as $Aentry): ?>	
							<?php if ($Aentry->id == 1 || $Aentry->id == 2){
							echo (
								'<td>'
								 .$Aentry->text
								 .'<br/>'
		 						 .'<a class="edit edit-block" href="edit/editAbout.php?id='. $Aentry->id .'">Edit</a>'
								 .'</td>'
							);
							} 
								
								
							?>

						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			
			<div id="tabs-b">
				<table class="table-pos">
					<thead>
						<th>Left Side Content</th>			  		
						<th>Right Side Content</th>
					</thead>
					<tbody>			
						<?php foreach($Aboutresults as $Aentry): ?>	
							<?php if ($Aentry->id == 3 || $Aentry->id == 4){
							echo (
								'<td>'
								 .$Aentry->text
								 .'<br/>'
		 						 .'<a class="edit edit-block" href="edit/editAbout.php?id='. $Aentry->id .'">Edit</a>'
								 .'</td>'
							);
							} 
								
								
							?>
							
						<?php endforeach; ?>
					</tbody>
				</table>						
			</div>
			
			<div id="tabs-c">
				<table class="table-pos">
					<thead>
						<th>Left Side Content</th>			  		
						<th>Right Side Content</th>
					</thead>
					<tbody>				
						<?php foreach($Aboutresults as $Aentry): ?>	
							<?php if ($Aentry->id == 5 || $Aentry->id == 6){
							echo (
								'<td>'
								 .$Aentry->text
								 .'<br/>'
		 						 .'<a class="edit edit-block" href="edit/editAbout.php?id='. $Aentry->id .'">Edit</a>'
								 .'</td>'
							);
							} 
								
								
							?>
							
						<?php endforeach; ?>
					</tbody>
				</table>						
			</div>

			<div id="tabs-d">
				<table class="table-pos">
					<thead>
						<th>Content</th>			  		
					</thead>
					<tbody>				
						<?php foreach($Aboutresults as $Aentry): ?>	
							<?php if ($Aentry->id == 7){
							echo (
								'<td>'
								 .$Aentry->text
								 .'<br/>'
		 						 .'<a class="edit edit-block" href="edit/editAbout.php?id='. $Aentry->id .'">Edit</a>'
								 .'</td>'
							);
							} 
								
								
							?>
							
						<?php endforeach; ?>
						<?php unset($Aboutresults);?>
					</tbody>
				</table>	
				
				<table class="margin-top">
					<thead>
						<th>About Pictures</th>
						<th>Text</th>
						<th>Picture</th>
						<th>HD Picture</th>
						<th>Actions</th>			  		
					</thead>
					<tbody>				
							<?php 
								//Table restults
								$pictures_About = $db->query('SELECT id, text, picture,picture_HD FROM pictures_About');
								
								try {
									if ($sqlAbout->execute()) {
										$p_AboutResults = $pictures_About->fetchAll(PDO::FETCH_OBJ);
									}
								}
									catch(PDOException $e){
										echo "Query Failed - content";
								}
								
							?>
	 						<?php foreach($p_AboutResults as $Prentry): ?>
							<tr>
								<?php echo (
									'<td></td>'
									.'<td>'.$Prentry->text.'</td>'
									.'<td class="spec">'.$Prentry->picture.'</td>'
									.'<td class="spec">'.$Prentry->picture_HD.'</td>'
									
								) ?>
								
								<td>
									<a class="edit" href="edit/editAboutPicture.php?id=<?php echo $Prentry->id; ?>">Edit</a>
									<a class="delete" href="delete/deleteAboutPicture.php?id=<?php echo $Prentry->id; ?>">Delete</a>
								</td>
							</tr>
	 						<?php endforeach; ?>
	 						<?php unset($p_AboutResults); ?>
	
					</tbody>
				</table>	
				
				<ul>
					<li class="create"><a href="add/addAboutPicture.php">Add new picture</a></li>
				</ul>		

			</div>
			
			<div id="tabs-e">
			
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
					<div id="tabs-patterns" class="clearfix">
						<ul>
							<li><a href="#tabs-01">Camouflage</a></li>
							<li><a href="#tabs-02">Carbon Fiber</a></li>
							<li><a href="#tabs-03">Designer</a></li>
							<li><a href="#tabs-04">Metal</a></li>
							<li><a href="#tabs-05">Stone</a></li>
							<li><a href="#tabs-06">Wood Grain</a></li>
							<li><a href="#tabs-07">Skulls</a></li>
						</ul>
						
						<ul>
							<li class="create"><a href="add/addPatternPicture.php">Add new pattern</a></li>
						</ul>	
						
						<div id="tabs-01" class="clearfix">	
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 1){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>				
						</div>
						
						<div id="tabs-02" class="clearfix">
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 2){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>

						</div>
						
						<div id="tabs-03">
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 3){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>
	
						</div>

						<div id="tabs-04">
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 4){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>

						</div>
						
						<div id="tabs-05">
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 5){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>

						</div>
						
						<div id="tabs-06">
							<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 6){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								
							</ul>

						</div>
						
						<div id="tabs-07">
													<ul>
								<?php foreach($pic_PatternsResults as $PPentry): ?>
								<?php
									if($PPentry->type == 7){
										echo '<li class="pull-left"><p>'.$PPentry->text.'</p><img src="../'.$PPentry->picture .'" alt="'.$PPentry->text .'">'
											 .'<a class="edit" href="edit/editPatterns.php?id='. $PPentry->id.'">Edit</a>'
											.'<a class="delete" href="delete/deletePatterns.php?id='. $PPentry->id.'">Delete</a></li>'
										; 
									}
									
								?>
								<?php endforeach; ?>
								<?php unset($pic_PatternsResults); ?>
								
							</ul>
						</div>
						
					</div><!--pattersn tabs-->
			</div>		  		  		  		  
			
		</div><!--end bottom tabs-->
	</div><!-- end of tabs #3-->
  
</div>








</div><!-- end content-->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script type="text/javascript" src="js/list.min.js"></script>
<script type="text/javascript" src="js/list.paging.js"></script>
<script type="text/javascript" src="js/table.paging.js"></script>
<script type="text/javascript" src="js/jquery.keepTab.js"></script>

<script>
$(function() {
	$( "#tabs" )
		.tabs({collapsible: true})
		.tabkeeper({tab: '#tabs'})
	;

    $( "#tabs-bottom" ).tabs();
    
    $("#tabs-patterns").tabs({collapsible: true});
 
    //tab bottom js
    // fix the classes
    $( ".tabs-bottom .ui-tabs-nav, .tabs-bottom .ui-tabs-nav > *" )
      .removeClass( "ui-corner-all ui-corner-top" )
      .addClass( "ui-corner-bottom" );
 
    // move the nav to the bottom
    $( ".tabs-bottom.ui-tabs-nav" ).appendTo( ".tabs-bottom" );	


	//$("#tabs-bottom").tabkeeper({tab: '#tabs-bottom'})
});
</script>

<script>
$(function() {
	
	var options = {
	    valueNames: [ 'name', 'uId','fname','access' ]
	};
	
	var featureList = new List('users', options);
	
	var options2 = {
	    valueNames: [ 'gName', 'gId','uId' ]
	};
	
	var featureList2 = new List('groups', options2);
});
</script>
