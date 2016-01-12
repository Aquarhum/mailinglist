<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=php_exam", "root", "root");
$message = "";



if(isset($_GET['id'])){

$requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
$requser->execute(array($_GET['id']));
$userinfo = $requser->fetch();	

$recup = $_GET['id'];
$insertmail = $bdd->prepare('UPDATE user SET valid = ? WHERE id = ?');
$insertmail->execute(array(1,$recup));

$message = " Merci ! Votre inscription est validée !";

}
else
{
	$message = " Désolé votre inscription n'a pas fonctionné  ";
}



?>


<html>
<head>
	<title>Confirmer votre inscription</title>
</head>
<body>
	<h1>Confirmation de l'inscription à la newsletter</h1>

	<p><?php if(isset($message)){ echo $message; } ?></p>

</body>
</html>