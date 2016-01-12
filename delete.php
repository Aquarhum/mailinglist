<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");


if(!isset($_SESSION['pseudo'])){
	header('Location: connexion.php');
	exit();
}
else{
	$delete = $bdd->prepare('DELETE FROM user WHERE id= ?');
	$delete->execute(array($_GET['id']));

	header('Location: list.php');
}
?>