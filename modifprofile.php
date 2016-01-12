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
		if($_POST['mail'] != $userinfo['mail']){

			$mail = trim(strip_tags($_POST['mail']));

			$exist = $bdd->prepare('SELECT * FROM user WHERE mail=?');
			$exist->execute(array($mail));
			$mailexist = $exist->rowCount();

				if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				{
					if( $mailexist == 0)
					{
					$insertmail = $bdd->prepare('UPDATE user SET mail = ? WHERE mail = ?');
					$insertmail->execute(array($mail,$userinfo['mail']));

					header('Location: list.php');
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
		else{
			echo "l'email n'a pas changé";
		}
		}

?>

<html>
<head>
	<title>Profil de <?php if(isset($userinfo['mail']))   ?> </title>
</head>
<body>

	<h1>Modifier le profil de <?php if(isset($userinfo['mail'])){ echo $userinfo['mail'];}  ?></h1>
	<p><?php if(isset($erreur)){echo $erreur;} ?></p>
	<form action"" method="POST">
		<input type="mail" name="mail" value="<?php if(isset($userinfo['mail'])){ echo $userinfo['mail'];} ?>">

		<input type="submit" name="submit" value="Modifier">

	</form>

</body>
</html>


<?php
;}
?>