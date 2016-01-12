<?php
session_start();

if(!isset($_SESSION['mail'])){
header('Location: index.php');
exit();

}

else{


?>

<html>
<head>
	<title>Vous êtes inscris</title>
</head>
<body>

	<h1>Félicitations vous êtes inscris avec le mail <b><?php if(isset($_SESSION['mail'])) { echo $_SESSION['mail'];} ?></b> </h1>
	<p> VOus devez confirmer votre inscription en cliquant sur le lien que nous venons de vous envoyer</p>

</body>
</html>

<?php
;}

?>