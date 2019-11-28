<?php 
	session_start();
	//$db = mysql_connect('localhost', 'Dallah', 'root1234', 'asterix');
		$db= new PDO('mysql:host=localhost;dbname=asterix;charset=utf8','Dallah','root1234');

	// initialize variables
	$prenom = "";
	$nom = "";
	$adresse = "";
	$telephone = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$adresse = $_POST['adresse'];
		$telephone = $_POST['telephone'];

		$db->query("INSERT INTO user (prenom, nom, adresse, telephone) VALUES ('$prenom', '$nom', '$adresse','$telephone')"); 
		$_SESSION['message'] = "Contact sauvegarde"; 
		header('location: index.php');
	}
?>	
	