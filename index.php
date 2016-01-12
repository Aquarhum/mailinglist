<?php
	session_start();
	$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");
	$erreur = "";


	if(isset($_POST['submit'])){

		$mail = trim(strip_tags($_POST['mail']));

		$exist = $bdd->prepare('SELECT * FROM user WHERE mail=?');
		$exist->execute(array($mail));
		$mailexist = $exist->rowCount();

			if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
			{
				if( $mailexist == 0)
				{
						$insertmail = $bdd->prepare('INSERT INTO user (mail,time,valid) VALUES(?,?,?)');
						$insertmail->execute(array($mail,date("Y-m-d H:i"),0));


						$requser = $bdd->prepare('SELECT * FROM user WHERE mail = ?');
						$requser->execute(array($mail));
						$userinfo = $requser->fetch();



						$_SESSION['mail'] = $mail;

						 $to      = $_SESSION['mail'];
					     $subject = 'Inscription à la newsletter';
					     $message = 'Bonjour ! Veuillez valider votre inscription en cliquant sur le lien suivant : http://jeremycoel.be/PHP/mailinglist/validation.php?id=' . $userinfo['id'] ;
					     $headers = 'From: webmaster@example.com' . "\r\n" .
					     'Reply-To: webmaster@example.com' . "\r\n" .
					     'X-Mailer: PHP/' . phpversion();
					 
					    $verifmail = mail($to, $subject, $message, $headers);


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

?>


<html>
<head>
	<title></title>
</head>
<body>	
	<h1>Inscription à la newsletter </h1>
	<p> <?php if(isset($erreur)){ echo $erreur;} ?></p>

	<p> <?php if(isset($succes)){ echo $succes;} ?></p>


	<form action"" method="POST">
		<input type="mail" name="mail" placeholder="Quel est ton mail">

		<input type="submit" name="submit" value="s'inscrire">

	</form>

	<a href="desinscription.php">Déja inscris ? Vous souhaitez vous désinscrire ?</a>

</body>
</html>