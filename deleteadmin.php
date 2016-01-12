<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");


if(!isset($_SESSION['pseudo'])){
	header('Location: admingestion.php');
	exit();
}
else{
	$delete = $bdd->prepare('DELETE FROM admin WHERE id= ?');
	$delete->execute(array($_GET['id']));

	header('Location: admingestion.php');
}
?>