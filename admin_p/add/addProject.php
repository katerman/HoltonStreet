<?php
session_start();



require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

$errors = array();

$group_Id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	//if there's no id redriect to the homepage
	if(empty($group_Id))
	{
		echo('Put in the correct Group Id yourself then');
	}

//sanitize all the fields
$project_Name = filter_input(INPUT_POST, 'project_Name',FILTER_SANITIZE_STRING);

$project_Text = filter_input(INPUT_POST, 'project_Text',FILTER_SANITIZE_STRING);

$project_Date = filter_input(INPUT_POST, 'project_Date',FILTER_SANITIZE_STRING);

$projects_GroupId = filter_input(INPUT_POST, 'projects_GroupId',FILTER_SANITIZE_NUMBER_INT);


$projects_Picture1 = filter_input(INPUT_POST, 'projects_Picture1',FILTER_SANITIZE_URL);

$projects_Picture2 = filter_input(INPUT_POST, 'projects_Picture2',FILTER_SANITIZE_URL);

$projects_Picture1HD = filter_input(INPUT_POST, 'projects_Picture1HD',FILTER_SANITIZE_URL);

$projects_Picture2HD = filter_input(INPUT_POST, 'projects_Picture2HD',FILTER_SANITIZE_URL);

$date = date("Y-m-d");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{		
		echo ("\n\n\n\n");
		echo 'Post';
	//validate the form

	if(empty($project_Name))
		$errors['project_Name']=true;

	if(empty($project_Text))
		$errors['project_Text']=true;

	if(empty($project_Date))
		$errors['project_Date']=true;

	if(empty($projects_GroupId))
		$errors['projects_GroupId']=true;
		
		echo ' end of errors';

	//if there are no errors put data into database
	if(empty($errors))
	{
		echo ' errors empty';
		$sql = $db->prepare('INSERT projects SET project_Name = :project_Name, project_Text = :project_Text, project_Date = :project_Date, projects_GroupId = :projects_GroupId, projects_Picture1 = :projects_Picture1, projects_Picture2 = :projects_Picture2, projects_Picture1HD = :projects_Picture1HD, projects_Picture2HD = :projects_Picture2HD');

		echo ' db prepared';

		//$sql->bindValue(':user_Id', $user_Id, PDO::PARAM_INT);
		$sql->bindValue(':project_Name',$project_Name, PDO::PARAM_STR);
		$sql->bindValue(':project_Text', $project_Text, PDO::PARAM_STR);
		$sql->bindValue(':project_Date', $project_Date, PDO::PARAM_STR);
		$sql->bindValue(':projects_GroupId',$projects_GroupId, PDO::PARAM_INT);

		$sql->bindValue(':projects_Picture1', $projects_Picture1, PDO::PARAM_STR);
		$sql->bindValue(':projects_Picture2', $projects_Picture2, PDO::PARAM_STR);		
		$sql->bindValue(':projects_Picture1HD', $projects_Picture1HD, PDO::PARAM_STR);
		$sql->bindValue(':projects_Picture2HD', $projects_Picture2HD, PDO::PARAM_STR);	
		
		echo 'hit before execute';
		$sql->execute();
		echo 'hit execute';
		header('location: ../index.php');
		exit;
	}

}

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">


<title>Add Update</title>
</head>
<body>

    <div id="content">
    <form action="addProject.php?id=<?php echo $group_Id ?>" method="post">

	    <h1>Create Project Update</h1>
	    <p>Make sure group id matches the right group, but if you came here its probably already right for you.</p>
	    <p>Each picture should have a url, the low quality one should reflect the fact that it is low quality</p>
	    
        <div>
        	<label for="projects_GroupId">Group ID</label>
        	<br/>
            <?php if(isset($errors['projects_GroupId'])): ?>
            <label for "projects_GroupId"><p class="error">Error! Enter their group id.</p></label>
            <?php endif; ?>
            <input id="projects_GroupId" name="projects_GroupId" value="<?php echo $group_Id; ?>">
        </div>
        	<br/> 	    
         <div>
        	<label for="project_Name">Project Title</label>
        	<br/>
            <?php if(isset($errors['project_Name'])): ?>
            <label for "project_Name"><p class="error">Error! Enter their project title.</p></label>
            <?php endif; ?>
            <input id="project_Name" name="project_Name" value="<?php echo $project_Name; ?>">
        </div>
        	<br/>      	
        <div class="pull-left">
        	<label for="projects_Picture1">Project Picture #1 (low)</label>
        	<br/>
            <?php if(isset($errors['projects_Picture1'])): ?>
            <label for "projects_Picture1"><p class="error">Error! Enter the projects Picture #1.</p></label>
            <?php endif; ?>
            <input id="projects_Picture1" name="projects_Picture1" value="<?php echo $projects_Picture1; ?>">
        </div>  
        
        <div class="pull-left">
        	<label for="projects_Picture2">Project Picture #2 (low)</label>
        	<br/>
            <?php if(isset($errors['projects_Picture2'])): ?>
            <label for "projects_Picture2"><p class="error">Error! Enter the projects Picture #2.</p></label>
            <?php endif; ?>
            <input id="projects_Picture2" name="projects_Picture2" value="<?php echo $projects_Picture2; ?>">
        </div>          
 
	        <br/><br/><br/><br/>
        
         <div class="pull-left">
        	<label for="projects_Picture1HD">Project Picture #1 (HD)</label>
        	<br/>
            <?php if(isset($errors['projects_Picture1HD'])): ?>
            <label for "projects_Picture1HD"><p class="error">Error! Enter the projects Picture #1HD.</p></label>
            <?php endif; ?>
            <input id="projects_Picture1HD" name="projects_Picture1HD" value="<?php echo $projects_Picture1HD; ?>">
        </div>  
        
        <div class="pull-left">
        	<label for="projects_Picture2HD">Project Picture #2 (HD)</label>
        	<br/>
            <?php if(isset($errors['projects_Picture2HD'])): ?>
            <label for "projects_Picture2HD"><p class="error">Error! Enter the projects Picture #2HD.</p></label>
            <?php endif; ?>
            <input id="projects_Picture2HD" name="projects_Picture2HD" value="<?php echo $projects_Picture2HD; ?>">
        </div>           
        	<br/> <br/> <br/><br/> <br/>    
        <div class="clear-fix">
        	<label for="project_Date">Project Date (YYYY-MM-DD)</label>
        	<br/>
            <?php if(isset($errors['project_Date'])): ?>
            <label for "project_Date"><p class="error">Error! Enter the project date.</p></label>
            <?php endif; ?>
            <input id="project_Date" name="project_Date" value="<?php echo $date; ?>">
        </div>   
        	<br/>      	
         <div class="clear-fix">
        	<label for="project_Name">Project Text</label>
        	<br/>
            <?php if(isset($errors['project_Text'])): ?>
            <label for "project_Text"><p class="error">Error! Enter their project text.</p></label>
            <?php endif; ?>
            <textarea  id="project_Text" name="project_Text" rows="6" col="10"><?php echo $project_Text; ?></textarea>
        </div>
        	<br/> 
        <div>
            <a href="../edit/editGroup.php?id=<?php echo $group_Id ?>">&lt;&lt; Back</a>
            <button type="submit">Save</button>
        </div>

    </form>
    </div>
</body>
</html>