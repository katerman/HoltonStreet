<?php
session_start();


require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

$errors = array();

//sanitize all the fields
$text = filter_input(INPUT_POST, 'text',FILTER_SANITIZE_STRING);

$picture = filter_input(INPUT_POST, 'picture',FILTER_SANITIZE_URL);

$picture_HD = filter_input(INPUT_POST, 'picture_HD',FILTER_SANITIZE_URL);


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//validate the form
	if(empty($text))
		$errors['text']=true;

	if(empty($picture))
		$errors['picture']=true;

	if(empty($picture_HD))
		$errors['picture_HD']=true;

	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = $db->prepare('INSERT pictures_About SET picture = :picture, text = :text, picture_HD = :picture_HD');
		
		$sql->bindValue(':picture', $picture, PDO::PARAM_STR);
		$sql->bindValue(':text',$text, PDO::PARAM_STR);
		$sql->bindValue(':picture_HD',$picture_HD, PDO::PARAM_STR);


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
    <form action="addAboutPicture.php" method="post">

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
        	<label for="picture_HD">HD Picture URL (bigger/fullsize picture)</label>
        	<br/>
            <?php if(isset($errors['picture_HD'])): ?>
            <label for="picture_HD"><p class="error">Error! Enter the hd picture url.</p></label>
            <?php endif; ?>
            <input id="picture_HD" name="picture_HD" value="<?php echo $picture_HD; ?>">
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