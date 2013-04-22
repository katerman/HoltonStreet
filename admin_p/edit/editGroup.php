<?php
session_start();

require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

//errors
$errors = array();

$group_Id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	//if there's no id redriect to the homepage
	if(empty($group_Id))
	{
		header('location: ../../index.php');
		exit;
	}

//sanitize all the fields
$user_Id = filter_input(INPUT_POST, 'user_Id',FILTER_SANITIZE_STRING);

$group_Name = filter_input(INPUT_POST, 'group_Name',FILTER_SANITIZE_STRING);



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//validate the form
	if(empty($user_Id))
		$errors['user_Id']=true;

	if(empty($group_Name))
		$errors['group_Name']=true;


		
	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = $db->prepare('UPDATE groups SET user_Id = :user_Id, group_Name = :group_Name WHERE group_Id = :group_Id');
		$sql->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
		$sql->bindValue(':group_Id', $group_Id, PDO::PARAM_STR);
		$sql->bindValue(':group_Name', $group_Name, PDO::PARAM_STR);


		$sql->execute();
		header('location: ../index.php#tabs-2');
		exit;
	}

}
else
{
	//display database information
	//shows the title in the value part
	$sql = $db->prepare('SELECT group_Id, user_Id, group_Name FROM groups WHERE group_Id = :group_Id');
	$sql->bindValue(':group_Id', $group_Id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);

	$group_Id = $results->group_Id;
	$user_Id = $results->user_Id;
	$group_Name = $results->group_Name;


}

?>

<html>
<head>
<title>Edit Group</title>
<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/eggplant/jquery-ui.css" type="text/css" media="screen">

</head>
<body>
	<div id="content">
		<div id="tabs">
		  <ul>
		    <li><a href="#tabs-1">Edit Group</a></li>
		    <li><a href="#tabs-2">Updates</a></li>
		  </ul>	
		  
	    <div id="tabs-1">	
		    <form action="editGroup.php?id=<?php echo $group_Id; ?>" method="post">

			    <h2>Edit - <?php  echo $results->group_Id; ?></h2>
			    <p>Make sure userId matches the right user.</p>
			    
		        <div>
		        	<label for="group_Name">Group Name</label>
		        	<br/>
		            <?php if(isset($errors['group_Name'])): ?>
		            <label for "group_Name"><p class="error">Error! Enter the group name.</p></label>
		            <?php endif; ?>
		            <input id="group_Name" name="group_Name" value="<?php echo $group_Name; ?>">
		        </div>   
		        	<br/>     	
		        <div>
		        	<label for="user_Id">User ID</label>
		        	<br/>
		            <?php if(isset($errors['user_Id'])): ?>
		            <label for "user_Id"><p class="error">Error! Enter the user id.</p></label>
		            <?php endif; ?>
		            <input id="user_Id" name="user_Id" value="<?php echo $user_Id; ?>">
		        </div>   
		        	<br/>      	
		
		        <div>
		            <a href="../index.php#tabs-2">&lt;&lt;Back</a>
		            <button type="submit">Save</button>
	           </div>
	
	    </form>
    </div><!-- tab 1-->

    <div id="tabs-2">	
    <h2>Updates</h2>
    

	    <p><a href="../index.php#tabs-2">&lt;&lt;Back</a></p> 
	    <p class="create"><a href="../add/addProject.php?id=<?php echo $group_Id; ?>">Add new Update</a></p>


		<?php 
		//projects
			$sqlProject = $db->query("SELECT projects_GroupId,project_Id, user_Id, project_Name, project_Text, project_Date, projects_Picture1, projects_Picture2, projects_Picture1HD, projects_Picture2HD FROM projects WHERE projects_GroupId = '$group_Id' ");
			
			$ProjectResults = $sqlProject->fetchAll(PDO::FETCH_OBJ);
		?>
		
    <table>
    	<thead>
            <th>Update ID</th>
            <th>Update Title</th>
            <th>Update Text</th>
            <th>Update Date</th>
            <th>Update Image1</th>
            <th>Update Image2</th>            
            <th>Actions</th>
        </thead>
        <tbody>
        	<?php foreach($ProjectResults as $Pentry): ?>
            <tr>
                <td><?php echo $Pentry->project_Id; ?></td>
                <td><?php echo $Pentry->project_Name; ?></td>
                <td><?php echo $Pentry->project_Text; ?></td>
                <td><?php echo $Pentry->project_Date; ?></td>
                <td><img class="spec" src="<?php echo $Pentry->projects_Picture1; ?>"></td>
                <td><img class="spec" src="<?php echo $Pentry->projects_Picture2; ?>"></td>                
                <td><a class="edit" href="editProject.php?id=<?php echo $Pentry->project_Id; ?>">Edit</a> <a class="delete" href="../delete/deleteProject.php?id=<?php echo $Pentry->project_Id; ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        
    </div><!-- end tab 2-->
    
  </div><!-- content-->
  
  <!-- JS -->
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <script>
	$( "#tabs" ).tabs({
	  collapsible: true
	});
  </script>
</body>
</html>