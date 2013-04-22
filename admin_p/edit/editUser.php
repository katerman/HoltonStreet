<?php
session_start();

require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

//errors
$errors = array();

$user_Id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	//if there's no id redriect to the homepage
	if(empty($user_Id))
	{
		header('location: ../index.php');
		exit;
	}

//sanitize all the fields
$user_uName = filter_input(INPUT_POST, 'user_uName',FILTER_SANITIZE_STRING);

$user_Pass = filter_input(INPUT_POST, 'user_Pass',FILTER_SANITIZE_STRING);

$user_FullName = filter_input(INPUT_POST, 'user_FullName',FILTER_SANITIZE_STRING);

$user_Access = filter_input(INPUT_POST, 'user_Access',FILTER_SANITIZE_STRING);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//validate the form
	if(empty($user_uName))
		$errors['user_uName']=true;

	if(empty($user_Pass))
		$errors['user_Pass']=true;

	if(empty($user_FullName))
		$errors['user_FullName']=true;

	if(empty($user_Access))
		$errors['user_Access']=true;

	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = $db->prepare('UPDATE users SET user_uName = :user_uName, user_Pass = :user_Pass, user_FullName = :user_FullName, user_Access = :user_Access WHERE user_Id = :user_Id');
		$sql->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
		$sql->bindValue(':user_uName', $user_uName, PDO::PARAM_STR);
		$sql->bindValue(':user_FullName', $user_FullName, PDO::PARAM_STR);
		$sql->bindValue(':user_Access', $user_Access, PDO::PARAM_STR);
		
		$sql->execute();

		if ($_POST['updatePassword'] == '1'){
			$sql->bindValue(':user_Pass', $user_Pass, PDO::PARAM_STR);
			//the next few lines reupdate the password to a more secure password, using 2 steps instead of one.
			$sqlUpdate = "UPDATE users SET user_Pass = MD5(CONCAT(user_Salt,user_Pass)) WHERE user_Id = $user_Id";
			$result = $db->prepare($sqlUpdate);
			$count = $result->execute();
		}
		else{
			header('location: ../index.php');  
			exit;
		}  
		
		header('location: ../index.php');  
		exit;		
	}

}
else
{
	//display database information
	//shows the title in the value part
	$sql = $db->prepare('SELECT user_Id, user_uName, user_Pass, user_FullName, user_Access FROM users WHERE user_Id = :user_Id');
	$sql->bindValue(':user_Id', $user_Id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);

	$user_uName = $results->user_uName;
	$user_Pass = $results->user_Pass;
	$user_FullName = $results->user_FullName;
	$user_Access = $results->user_Access;
	
}

?>
<html>
<head>
<title>Edit User</title>
<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">

</head>
<body>
	<div id="content">
    <form action="editUser.php?id=<?php echo $user_Id; ?>" method="post">

	    <h1>Edit User</h1>
	    <p>Access level, 2 is regular user, 1 is admin.</p>
	    <p>Password is encrypted, to change it enter a new one, and check the box. Else leave it alone or it will break it.</p> 
        <div>
        	<label for="user_uName">Username</label>
        	<br/>
            <?php if(isset($errors['user_uName'])): ?>
            <label for "user_uName"><p class="error">Error! Enter their user name.</p></label>
            <?php endif; ?>
            <input id="user_uName" name="user_uName" value="<?php echo ($user_uName); ?>">
        </div>
        	<br/> 
         <div>
        	<label for="user_Pass">Password</label>
        	<br/>
            <?php if(isset($errors['user_Pass'])): ?>
            <label for "user_Pass"><p class="error">Error! Enter their password.</p></label>
            <?php endif; ?>
            <input id="user_Pass" name="user_Pass" value="<?php echo $user_Pass; ?>">
        </div>
        	<br/>
         <div>
        	<label for="user_FullName">First/Last name</label>
        	<br/>
            <?php if(isset($errors['user_FullName'])): ?>
            <label for "user_FullName"><p class="error">Error! Enter their fullname.</p></label>
            <?php endif; ?>
            <input id="user_FullName" name="user_FullName" value="<?php echo $user_FullName; ?>">
        </div>
        	<br/>
         <div>
        	<label for="user_Access">Access Level</label>
        	<br/>
            <?php if(isset($errors['user_Access'])): ?>
            <label for "user_Access"><p class="error">Error! Enter their access level 1=admin, 2=regular user.</p></label>
            <?php endif; ?>
            <input id="user_Access" name="user_Access" value="<?php echo $user_Access; ?>">
        </div>	 
        	<br/>
        <input id="checkbox" type="checkbox" name="updatePassword" value="1">Update Password<br>   
        	<br/>
        <div>
            <a href="../index.php">&lt;&lt;Back</a>
            <button type="submit">Save</button>
        </div>
        
        

    </form>
  </div>
</body>
</html>