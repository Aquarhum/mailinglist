<?php
session_start();

if(!isset($_SESSION['pseudo'])){
header("Location: connexion.php");
exit();
}
else{
?>


<html>
<head>
	<title>Administration</title>
</head>
<body>

	<h1>Bonjour <?php if(isset($_SESSION['pseudo'])){ echo $_SESSION['pseudo'];} ?></h1>

	<ul>
		<li><a href="admingestion.php">Gérer les administrateurs</a></li>
		<li><a href="list.php">Gérer la liste d'utilisateurs</a></li>
		<li><a href="send.php">Envoyer un mail</a></li>
		<li><a href="decon.php">Se déconnecter</a></li>
	</ul>

</body>
</html>

<?php
;}



?>