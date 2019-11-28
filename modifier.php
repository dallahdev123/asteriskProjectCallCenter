<?php 
	session_start();
	//$db = mysql_connect('localhost', 'Dallah', 'root1234', 'asterix');
	$db= new PDO('mysql:host=localhost;dbname=asterix;charset=utf8','Dallah','root1234');
	
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = $db->query("SELECT * FROM user WHERE userId=$id");

		while ($n=$record->fetch()) {
			$prenom = $n['prenom'];
			$nom = $n['nom'];
			$adresse = $n['adresse'];
			$telephone = $n['telephone'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
	<form method="post" action="" >
		<div class="input-group">
			<label>Prenom</label>
			<input type="text" name="prenom" value='<?php echo "$prenom"; ?>'>
		</div>
		<div class="input-group">
			<label>Nom</label>
			<input type="text" name="nom" value='<?php echo "$nom"; ?>'>
		</div>
		<div class="input-group">
			<label>Adresse</label>
			<input type="text" name="adresse" value='<?php echo "$adresse"; ?>'>
		</div>
		<div class="input-group">
			<label>Telephone</label>
			<input type="number" name="telephone" value='<?php echo "$telephone"; ?>'>
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save">Save</button>
		</div>
		
	</form>
    
</body>
</html>

<?php

if (isset($_POST['save'])) {
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$telephone = $_POST['telephone'];

		$update =$db->query("UPDATE user SET prenom='$prenom', nom='$nom', adresse='$adresse', telephone='$telephone' WHERE userId=$id");
		$_SESSION['message'] = "Modification Effectuees"; 
		header('location: index.php');
	}
?>