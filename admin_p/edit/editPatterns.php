<?php
session_start();

require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

//errors
$errors = array();

$pId = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	//if there's no id redriect to the homepage
	if(empty($pId))
	{
		header('location: ../index.php');
		exit;
	}

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
		$sql = $db->prepare('UPDATE pictures_Patterns SET text = :text, picture = :picture, type = :type WHERE id = :id');
		$sql->bindValue(':id', $pId, PDO::PARAM_STR);
		$sql->bindValue(':text', $text, PDO::PARAM_STR);
		$sql->bindValue(':picture', $picture, PDO::PARAM_STR);
		
		if(isset($_POST['type']) )
		{
		  $typePost = $_POST['type'];
	  		$sql->bindValue(':type', $type, PDO::PARAM_STR);
		}
		
		$sql->execute();
		header('location: ../index.php');  
		exit;		
	}

}
else
{
	//display database information
	//shows the title in the value part
	$sql = $db->prepare('SELECT text, id,picture,type FROM pictures_Patterns WHERE id = :id');
	$sql->bindValue(':id', $pId, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);

	$text = $results->text;
	$picture = $results->picture;
	$type = $results->type;
	
}


?>

<html>
<head>
<title>Edit About </title>
<link rel="stylesheet" href="../css/global.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="../js/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="../js/markitup/sets/html/style.css" />

</head>
<body>
	<div id="content">
    <form action="editPatterns.php?id=<?php echo $pId; ?>" method="post">

	    <h1>Edit Pattern Picture - <?php echo $pId ; ?></h1>
	    <p>edit this pictures descriptive text, and its url Ex.(www.blah.com/image.jpg).</p>
	    	    
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
        	<label for="picture">Picture URL</label>
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
				<option value="1" <?php if($type == 1){echo 'selected="selected"';} ?>>Camouflage</option>
				<option value="2" <?php if($type == 2){echo 'selected="selected"';} ?>>Carbon Fiber</option>
				<option value="3" <?php if($type == 3){echo 'selected="selected"';} ?>>Designer</option>
				<option value="4" <?php if($type == 4){echo 'selected="selected"';} ?>>Metal</option>
				<option value="5" <?php if($type == 5){echo 'selected="selected"';} ?>>Stone</option>
				<option value="6" <?php if($type == 6){echo 'selected="selected"';} ?>>Wood Grain</option>
				<option value="7" <?php if($type == 7){echo 'selected="selected"';} ?>>Skulls</option>

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