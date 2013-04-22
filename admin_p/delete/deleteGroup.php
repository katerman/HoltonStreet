<?php
session_start();


require_once '../db.php';
require_once('../includes/security.php');

if( isset($_GET['id']))
{
	$sql = $db->prepare('DELETE FROM groups WHERE group_Id = :id');
	$sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	$sql->execute();
}

	header('Location: ../index.php');
	//exit;

?>
