<?php
session_start();


require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

$errors = array();

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
		$sql = $db->prepare('INSERT groups SET group_Name = :group_Name, user_Id = :user_Id');
		
		$sql->bindValue(':group_Name', $group_Name, PDO::PARAM_STR);
		$sql->bindValue(':user_Id',$user_Id, PDO::PARAM_STR);

		$sql->execute();
		header('location: ../index.php');
		exit;
	}

}

?>
<!DOCTYPE html>
<html>
<head>
 
<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">



<title>Add Group</title>
</head>
<body>

    <div id="content">
    <form action="addGroup.php" method="post">

	    <h1>Add Group</h1>
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
    </div>
</body>
</html>