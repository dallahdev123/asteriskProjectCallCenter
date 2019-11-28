<!DOCTYPE html>
<?php  //include('server.php');
session_start();
	//$db = mysql_connect('localhost', 'Dallah', 'root1234', 'asterix');
	$db= new PDO('mysql:host=localhost;dbname=asterix;charset=utf8','Dallah','root1234');

	?>
<html>
<head>
	<meta charset="utf-8">
	<title>Asterix-Project</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

	<form method="post" action="controller.php" >
		<div class="input-group">
			<label>Prenom</label>
			<input type="text" name="prenom" value="">
		</div>
		<div class="input-group">
			<label>Nom</label>
			<input type="text" name="nom" value="">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="adresse" value="">
		</div>
		<div class="input-group">
			<label>Telephone</label>
			<input type="number" name="telephone" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save">Save</button>
		</div>
		
		
		<?php $results = $db->query("SELECT * FROM user"); ?>

<table>
	<thead>
		<tr>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Adresse</th>
			<th>Telephone</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = $results->fetch()) { ?>
		<tr>
			<td><?php echo $row['prenom']; ?></td>
			<td><?php echo $row['nom']; ?></td>
			<td><?php echo $row['adresse']; ?></td>
			<td><?php echo $row['telephone']; ?></td>
			<td>
				<a href="modifier.php?edit=<?php echo $row['userId']; ?>" class="edit_btn" >Modifier</a>
			</td>
			<td>
				<a href="supprimer.php?del=<?php echo $row['userId']; ?>" class="del_btn">Supprimer</a>
			</td>
			<td>
				<a href="call.php?call=<?php echo $row['userId']; ?>" class="call_btn">Appeler</a>
			</td>
		</tr>
	<?php } ?>
</table>
	</form>
</body>
</html>