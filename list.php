<?php

	session_start();
	$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");
	$erreur = "";

if(isset($_SESSION['pseudo'])){




	if(!isset($_SESSION['pseudo'])){
	header('Location: connexion.php');
	exit();
	}
	else{




?>

<html>
<head>
	<title>Liste des utilisateurs</title>
</head>
<body>
	<a href="admin.php" >Retour à l'admin</a>
	<a href="create.php">Créer un utilisateur</a>


	<main style="margin-top:50px;">

		<?php
				$result = $bdd->query('SELECT * FROM user');



				while($userlist = $result->fetch())
				{
					?>
						<?php if($userlist['valid'] == 0){ echo 'Email Pas validé' ;}else{ echo 'Email Validé'; } ?> <?php echo  " ||| " . $userlist['id'] . ": " . $userlist['mail']  . "<a href='delete.php?id=" . $userlist['id'] . "'>Supprimer</a>" . "<a href='modifprofile.php?id=" . $userlist['id'] . "'>Modifer</a>" . "<br />" ; 
				}
			
		?>


	</main>
</body>
</html>

<?php
}
}

?>