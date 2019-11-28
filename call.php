<?php 
	session_start();
	//$db = mysql_connect('localhost', 'Dallah', 'root1234', 'asterix');
	$db= new PDO('mysql:host=localhost;dbname=asterix;charset=utf8','Dallah','root1234');
	
	if (isset($_GET['call'])) {
		$id = $_GET['call'];
		$update = true;
		$record = $db->query("SELECT * FROM user WHERE userId=$id");

		while ($n=$record->fetch()) {
			$prenom = $n['prenom'];
			$nom = $n['nom'];
			$adresse = $n['adresse'];
			$telephone = $n['telephone'];
		}
    }

//Création du fichier dans le repertoire outgoing
$file ="/var/spool/asterisk/outgoing/$nom.call";

if(!is_file($file)){
$contents=["[local]","\nChanel: SIP / $telephone","\nMaxRetries:2","\nRetryTime:60","\nWaitTime:30","\nContexte:local","\nExtension:01"];
file_put_contents($file, $contents);


echo "<h1>Fichier bien creer</h1>";
}else{
    echo "<h1>L'ouverture du fichier a echouer</h1>";
}
// Ougtoing file
$outgoing = '/var/spool/asterisk/outgoing/';
//rename($file, $outgoing . pathinfo($file, PATHINFO_BASENAME));
?>