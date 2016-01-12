<?php

session_start();
$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");
$erreur = "";


if(isset($_SESSION['pseudo'])){
	header('Location: admin.php');
	exit();
}
else{


if(isset($_POST['submit']))
{
	if(isset($_POST['pseudo']) AND  isset($_POST['mdp']))
	{

		$pseudo_clean = trim(strip_tags($_POST['pseudo']));
		$mdp_clean = trim(strip_tags($_POST['mdp']));


		if(!empty($pseudo_clean) AND !empty($mdp_clean))
		{
			$verifmatch = $bdd->prepare('SELECT * FROM admin WHERE pseudo = ? AND password = ?');
			$verifmatch->execute(array($pseudo_clean , $mdp_clean));
			$matchexist = $verifmatch->rowCount();

			if($matchexist == 1){

				$userinfo = $verifmatch->fetch();

				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				setcookie('pseudo', $userinfo['pseudo'], time() + 365*24*3600, null, null, false, true); 

				$_SESSION['password'] = $userinfo['password'];

				header("Location: admin.php");
				exit();		
			}
			else{
				$erreur = "Veuillez vérifier vos identifiants de connexion ";
			}
		}
		else
		{
			$erreur = "Merci de remplir tous les champs";
		}
	}
}

?>


<html>
<head>
	<title>Connexion</title>
</head>
<body>
	<p> <?php if(isset($erreur)){ echo $erreur; } ?></p>
	<form action="" method="POST">
		<input type="text" name="pseudo" placeholder="Votre Identifiant" value="<?php if(isset($_COOKIE['pseudo'])){ echo $_COOKIE['pseudo']; } ?>">
		<input type="password" name="mdp" placeholder="Votre mot de mot passe">

		<input type="submit" value="Se connecter" name="submit">


	</form>

</body>
</html>


<?php
;}


?>