<?php 
	session_start();
	//$db = mysql_connect('localhost', 'Dallah', 'root1234', 'asterix');
	$db= new PDO('mysql:host=localhost;dbname=asterix;charset=utf8','Dallah','root1234');
	
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$db->query("DELETE FROM user WHERE userId=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}

?>