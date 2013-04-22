<?php
session_start();


require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

$errors = array();

//sanitize all the fields
$user_uName = filter_input(INPUT_POST, 'user_uName',FILTER_SANITIZE_STRING);

$user_Pass = filter_input(INPUT_POST, 'user_Pass',FILTER_SANITIZE_STRING);

$user_FullName = filter_input(INPUT_POST, 'user_FullName',FILTER_SANITIZE_STRING);

$user_Access = filter_input(INPUT_POST, 'user_Access',FILTER_SANITIZE_STRING);

function random_numbers($digits){ 
    $min = pow(10, $digits - 1);
    $max = pow(10, $digits) - 1;
    return mt_rand($min, $max);
}

$salt = random_numbers(8);

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
		$sql = $db->prepare('INSERT users SET user_uName = :user_uName, user_FullName = :user_FullName, user_Access = :user_Access, user_Salt = :user_Salt, user_Pass = :user_Pass');
		
		$sql->bindValue(':user_uName', $user_uName, PDO::PARAM_STR);
		$sql->bindValue(':user_Pass',$user_Pass, PDO::PARAM_STR);
		$sql->bindValue(':user_FullName', $user_FullName, PDO::PARAM_STR);
		$sql->bindValue(':user_Access', $user_Access, PDO::PARAM_STR);
		$sql->bindValue(':user_Salt', $salt, PDO::PARAM_STR);

		$sql->execute();
		header('location: ../index.php');

		
		//the next few lines reupdate the password to a more secure password, using 2 steps instead of one.
		$sqlUpdate = "UPDATE users SET user_Pass = MD5(CONCAT(user_Salt,user_Pass))";
		$result = $db->prepare($sqlUpdate);
		$count = $result->execute();
		exit;
	}

}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">

<title>Add User</title>
</head>
<body>

    <div id="content">
    <form action="addUser.php" method="post">

	    <h1>Create User</h1>
	    <p>Access level, 2 is regular user, 1 is admin.</p>
        <div>
        	<label for="user_uName">Username</label>
        	<br/>
            <?php if(isset($errors['user_uName'])): ?>
            <label for "user_uName"><p class="error">Error! Enter their user name.</p></label>
            <?php endif; ?>
            <input id="user_uName" name="user_uName" value="">
        </div>
    		<br/>
         <div>
        	<label for="user_Pass">Password</label>
    		<br/>
            <?php if(isset($errors['user_Pass'])): ?>
            <label for "user_Pass"><p class="error">Error! Enter their password.</p></label>
            <?php endif; ?>
            <input id="user_Pass" name="user_Pass" value="">
        </div>
    		<br/>
         <div>
        	<label for="user_FullName">First/Last name</label>
    		<br/>
            <?php if(isset($errors['user_FullName'])): ?>
            <label for "user_FullName"><p class="error">Error! Enter their fullname.</p></label>
            <?php endif; ?>
            <input id="user_FullName" name="user_FullName" value="">
        </div>
    		<br/>
         <div>
        	<label for="user_Access">Access Level</label>
    		<br/>
            <?php if(isset($errors['user_Access'])): ?>
            <label for "user_Access"><p class="error">Error! Enter their access level 1=admin, 2=regular user.</p></label>
            <?php endif; ?>
            <input id="user_Access" name="user_Access" value="2">
        </div>
    		<br/>

            <a href="../index.php">&lt;&lt;Back</a>
            <button type="submit">Save</button>
        </div>       
        

    </form>
    </div>
</body>
</html>