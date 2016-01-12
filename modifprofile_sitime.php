<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");


if(!isset($_SESSION['pseudo'])){
	header('Location: connecion.php');
	exit();
}
else{
	$requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
	$requser->execute(array($_GET['id']));
	$userinfo = $requser->fetch();

	if(isset($_POST['submit'])){


			$mail = trim(strip_tags($_POST['mail']));

			$exist = $bdd->prepare('SELECT * FROM user WHERE mail=?');
			$exist->execute(array($mail));
			$mailexist = $exist->rowCount();

				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				{
					if( $mailexist == 0)
					{
						if($_POST['val'] == 0)
						{		
					
							 $to      =  $mail;
						     $subject = 'Inscription à la newsletter';
						     $message = 'Bonjour ! Veuillez valider votre inscription en cliquant sur le lien suivant';
						     $headers = 'From: webmaster@example.com' . "\r\n" .
						     'Reply-To: webmaster@example.com' . "\r\n" .
						     'X-Mailer: PHP/' . phpversion();
						 
						    $verifmail = mail($to, $subject, $message, $headers);

						     if($verifmail)
						     {

						     	$insertmail = $bdd->prepare('UPDATE user SET mail = ?, valid = 0 WHERE mail = ? ');
								$insertmail->execute(array($mail,$userinfo['mail']));

								header('Location: modifprofile.php');
								exit();
							}

						 }
						 else{

						$insertmail = $bdd->prepare('UPDATE user SET mail = ?, valid = 1 WHERE mail = ? ');
						$insertmail->execute(array($mail,$userinfo['mail']));

						header('Location: modifprofile.php');
						exit();
					}
					}
					else{
						$erreur = "Mail déja inscris à la newsletter";
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
	<title>Profil de <?php if(isset($userinfo['mail']))   ?> </title>
</head>
<body>

	<h1>Modifier le profil de <?php if(isset($userinfo['mail'])){ echo $userinfo['mail'];}  ?></h1>
	<a href="list.php">Retourner sur la homepage</a>
	<p><?php if(isset($erreur)){echo $erreur;} ?></p>
	<form action"" method="POST">
		<input type="mail" name="mail" value="<?php if(isset($userinfo['mail'])){ echo $userinfo['mail'];} ?>">

				<select name="val">
			<option value="1">Email Valide</option>
			<option value="0">Email pas Valide</option>
		</select>

		<input type="submit" name="submit" value="Modifier">

	</form>


</body>
</html>


<?php
;}
?>