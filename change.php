<?php
session_start();

if(isset($_SESSION[''])){
	if(isset($_POST['submit'])){

		if($_POST['mail'] != $_SESSION['mail'])
		{
			$mail = trim(strip_tags($_POST['mail']));

			$exist = $bdd->prepare('SELECT * FROM user WHERE mail=?');
			$exist->execute(array($mail));
			$mailexist = $exist->rowCount();

				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				{
					if( $mailexist == 0)
					{
					$insertmail = $bdd->prepare('UPDATE user SET mail = ? WHERE mail = ?');
					$insertmail->execute(array($mail,$_SESSION['mail']));

					$_SESSION['mail'] = $mail;
					header('Location: succes.php');
					exit();
					
					}
					else{
						$erreur = "Vous êtes déja inscris à notre newsletter ou vous devez valider votre mail";
					}
				}
				else
				{
					$erreur = "Le mail n'est pas valide";
				}
		}
	}
}

?>

<html>
<head>
	<title>Changement de mail</title>
</head>
<body>

	<h1>Changement de mail d'inscription</h1>
	
	<form action="" method="POST">
	<input type="mail" name="mail" value= '<?php if(isset($_SESSION["mail"])) { echo $_SESSION["mail"]; } ?>' >

	<input type="submit" name="submit" value"Changer mon adresse mail">
	</form>

</body>
</html>