<?php
session_start();


$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");
$erreur = "";

if(!isset($_SESSION['pseudo'])){
	header('Location: connexion.php ');
	exit();
}


if(isset($_POST['submit']))

{

	// Clean + save in session
	$pseudo = trim(strip_tags($_POST['pseudo']));

	$mdp = trim(strip_tags($_POST['mdp']));



		if(isset($pseudo)  AND isset($mdp))
		{
			if(!empty($pseudo)  AND !empty($mdp))
			{
					// Verification si le mail existe
					$verifpseudo = $bdd->prepare("SELECT * FROM admin WHERE pseudo = ?");
					$verifpseudo->execute(array($pseudo));
					$pseudoexist = $verifpseudo->rowCount();


					if($pseudoexist == 0)
					{
						// Insere les valeurs dans la db
						$insertmb = $bdd->prepare("INSERT INTO admin (pseudo,password) VALUES(?, ?)");
						$insertmb->execute(array($pseudo,$mdp));

						header('Location: admingestion.php');
						exit();
					}
					// Msg erreur si pseudo existe déja
					else
					{
						$erreur = $erreur ."<br /> Désolé Gro, ce pseudo est déja utilisé";
					}
				
	
			}
			else
			{
				$erreur = $erreur ."<br /> Meeeeec ! Remplis tout le formulaire stp !";
			}

		}
		else{
			echo " tous les champs sont obligatoires";		
		}
		
	
}

?>

<html>
<head>
	<title>Créer un administrateur</title>
</head>
<body>
	<h1>Créer un nouvel administrateur</h1>
	<a href="admin.php">Retourner a l'administration</a>

	<form action="" method="POST">
		<input type="text" name="pseudo" placeholder="Nom d'utilisateur">
		<input type="text" name="mdp" placeholder="Mot de passe">

		<input type="submit" name="submit" value="creer une nouvel administrateur">

	</form>


	<div>


		<?php
				$result = $bdd->query('SELECT * FROM admin');



				while($userlist = $result->fetch())
				{
					?>
						<?php   echo   $userlist['id'] . ": " . $userlist['pseudo']  . "<a href='deleteadmin.php?id=" . $userlist['id'] . "'>Supprimer</a>"  . "<br />" ; 
				}
			
		?>




	</div>

</body>
</html>