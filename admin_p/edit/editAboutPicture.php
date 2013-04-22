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
		$sql = $db->prepare('UPDATE pictures_About SET text = :text, picture = :picture, picture_HD = :picture_HD WHERE id = :id');
		$sql->bindValue(':id', $pId, PDO::PARAM_STR);
		$sql->bindValue(':text', $text, PDO::PARAM_STR);
		$sql->bindValue(':picture', $picture, PDO::PARAM_STR);
		$sql->bindValue(':picture_HD', $picture_HD, PDO::PARAM_STR);
		
		$sql->execute();
		header('location: ../index.php');  
		exit;		
	}

}
else
{
	//display database information
	//shows the title in the value part
	$sql = $db->prepare('SELECT text, id,picture,picture_HD FROM pictures_About WHERE id = :id');
	$sql->bindValue(':id', $pId, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);

	$text = $results->text;
	$picture = $results->picture;
	$picture_HD = $results->picture_HD;
	
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
    <form action="editAboutPicture.php?id=<?php echo $pId; ?>" method="post">

	    <h1>Edit About Pictures - <?php echo $pId ; ?></h1>
	    <p>edit this pictures descriptive text, and its url Ex.(www.blah.com/image.jpg).</p>
	    <p>this picture will be lightboxed meaning it needs both a larger picture and a small picture (150x150).</p>
	    
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