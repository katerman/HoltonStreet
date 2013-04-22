<?PHP
	$accessLevel = $_SESSION['userInfo']["access"];
	if($accessLevel != 1){
		header('location: ../../index.php');
		exit;
	}
?>