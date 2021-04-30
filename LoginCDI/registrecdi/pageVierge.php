<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="MiseEnPage.css" />
		<title>Accueil - Registre du CDI</title>

	</head>
	
	<header>
		<?php include("header.php"); ?>
	</header>
	<body>
		<p>test</p>

<?php
		$bdd = new PDO('mysql:host=va601736-001.privatesql;port=35226;dbname=Projet;charset=utf8', 'Projet', 'Snbaggio59');
		// STATISTIQUE HOMME 
		$req = $bdd->query("SELECT  COUNT(*) as Inform FROM eleves WHERE sexe_eleves=1  " );

		$donnees = $req->fetch();
		$req->closeCursor();
		echo "Il y a ";
		echo $donnees['Inform'];
		echo " personnes de sexe masculin dans le CDI";
		echo "<br>";

		// STATISTIQUE FEMMES 
		$reqV2 = $bdd->query("SELECT  COUNT(*) as Inform FROM eleves WHERE sexe_eleves=0  " );

		$donneesV2 = $reqV2->fetch();
		$reqV2->closeCursor();
		echo "Il y a ";
		echo $donneesV2['Inform'];
		echo " personnes de sexe feminin dans le CDI";


?>
		
	</body>
	<footer>
		<?php include("footer.php"); ?>
	</footer>

</html>