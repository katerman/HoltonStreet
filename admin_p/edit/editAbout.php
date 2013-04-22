<?php
session_start();

require_once '../includes/filter-wrapper.php';
require_once '../db.php';
require_once('../includes/security.php');

//errors
$errors = array();

$cId = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
	//if there's no id redriect to the homepage
	if(empty($cId))
	{
		header('location: ../index.php');
		exit;
	}

//sanitize all the fields
$text = filter_input(INPUT_POST, 'text');


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//validate the form
	if(empty($text))
		$errors['text']=true;


	//if there are no errors put data into database
	if(empty($errors))
	{
		$sql = $db->prepare('UPDATE content SET text = :text WHERE id = :id');
		$sql->bindValue(':id', $cId, PDO::PARAM_STR);
		$sql->bindValue(':text', $text, PDO::PARAM_STR);

		
		$sql->execute();
		header('location: ../index.php');  
		exit;		
	}

}
else
{
	//display database information
	//shows the title in the value part
	$sql = $db->prepare('SELECT text, id FROM content WHERE id = :id');
	$sql->bindValue(':id', $cId, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch(PDO::FETCH_OBJ);

	$text = $results->text;

	
}

//multiple string replacements changing excess of spacing into carrige returns, also tabs
//$searches = array("\t", "   ", "    ","     ");
//$replacements = array(" ", "\t", "\t", "\t");
//$textarea = str_replace($searches, $replacements, $text);
$textarea = preg_replace('/(?:\s\s+|\n|\t)/',"\n ",$text)


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
    <form action="editAbout.php?id=<?php echo $cId; ?>" method="post">

	    <h1>Edit Site Content - <?php echo $cId ; ?></h1>
	    <p>Fill out some content, this is all in html markup make sure everything is mark'd up properly.</p>
	    
        <div>
        	<label for="text">Content</label>
        	<br/>
            <?php if(isset($errors['text'])): ?>
            <label for="text"><p class="error">Error! Enter some content/text.</p></label>
            <?php endif; ?>
            <textarea  id="text" name="text" cols="80" rows="20"><?php echo htmlspecialchars($textarea); ?></textarea>
        </div>
        	<br/> 	    
        <div>
            <a href="../index.php">&lt;&lt;Back</a>
            <button type="submit">Save</button>
        </div>

    </form>
  </div>
  
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="../js/markitup/jquery.markitup.js"></script>
  <script type="text/javascript" src="../js/markitup/sets/default/set.js"></script>
	<script language="javascript">
	$(document).ready(function()	{
		$('textarea').markItUp(myHtmlSettings);
		
	});
	</script>
</body>
</html>