<?php

$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");


if(isset($_POST['submit'])){


		$mail = trim(strip_tags($_POST['mail']));

		$exist = $bdd->prepare('SELECT * FROM user WHERE mail=?');
		$exist->execute(array($mail));
		$mailexist = $exist->rowCount();
		
			if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
			{
				if( $mailexist >= 1)
				{
					$insertmail = $bdd->prepare('DELETE FROM user WHERE mail=?');
					$insertmail->execute(array($mail));
					$erreur = "Vous êtes bien désinscris de notre newsletter";
				}
				else
				{
					$erreur = "Il semblerait que vous ne soyez pas inscris";
				}
			}
			else
			{
				$erreur = "Le mail n'est pas valide";
			}
}


?>


<html>
<head>
	<title>Désincription</title>
</head>
<body>
	<h1>Désincription de notre newsletter</h1>
	<p> <?php if(isset($erreur)){ echo $erreur;} ?></p>

	<form action="" method="POST">
		<input type="mail" name="mail" placeholder="Votre mail">
		<input type="submit" value="Se désinscrire" name="submit">

	</form>

	<a href="index.php"> VOus souhaitez vous inscrire à notre newsletter ?</a>

</body>
</html>