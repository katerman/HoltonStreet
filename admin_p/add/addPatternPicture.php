<?php
session_start();


require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

$errors = array();

//sanitize all the fields
$text = filter_input(INPUT_POST, 'text',FILTER_SANITIZE_STRING);

$picture = filter_input(INPUT_POST, 'picture',FILTER_SANITIZE_URL);

$type = filter_input(INPUT_POST, 'type',FILTER_SANITIZE_NUMBER_INT);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//validate the form
	if(empty($text))
		$errors['text']=true;

	if(empty($picture))
		$errors['picture']=true;
		
	if(empty($type))
		$errors['type']=true;


	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = $db->prepare('INSERT pictures_Patterns SET picture = :picture, text = :text, type = :type');
		
		$sql->bindValue(':picture', $picture, PDO::PARAM_STR);
		$sql->bindValue(':text',$text, PDO::PARAM_STR);
		
		//set to type
		if(isset($_POST['type']) )
		{
		  $typePost = $_POST['type'];
			$sql->bindValue(':type',$type, PDO::PARAM_STR);
		}

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
    <form action="addPatternPicture.php" method="post">

	    <h1>Add water transfer picture</h1>
	    <p>Fill out the descriptive text, and fill in the url correctly Ex.(www.blah.com/img.jpg).</p>
	    

        <div>
        	<label for="text">Descriptive Text</label>
        	<br/>
            <?php if(isset($errors['text'])): ?>
            <label for="text"><p class="error">Error! Enter some descriptive text.</p></label>
            <?php endif; ?>
            <input id="text" name="text" value="<?php echo $text; ?>">
        </div>
        	<br/> 	
        <div>
        	<label for="text">Picture URL</label>
        	<br/>
            <?php if(isset($errors['picture'])): ?>
            <label for="picture"><p class="error">Error! Enter the picture url.</p></label>
            <?php endif; ?>
            <input id="picture" name="picture" value="<?php echo $picture; ?>">
        </div>
        	<br/> 	
        <div>
        	<label for="type">Type</label>
        	<br/>
        	
			<select name="type">
				<option value="1">Camouflage</option>
				<option value="2">Carbon Fiber</option>
				<option value="3">Designer</option>
				<option value="4">Metal</option>
				<option value="5">Stone</option>
				<option value="6">Wood Grain</option>
				<option value="7">Skulls</option>

			</select>
        </div>
        	<br/>           	        	    
        <div>
            <a href="../index.php">&lt;&lt;Back</a>
            <button type="submit">Save</button>
        </div>

    </form>
    </div>
</body>
</html>