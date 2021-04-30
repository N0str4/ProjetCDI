<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<META HTTP-EQUIV="Refresh" CONTENT="60; URL=http://51.77.220.131/registrecdi/elevespresent.php">
        <link rel="stylesheet" href="MiseEnPage.css" />
		<title>Elèves présents dans le CDI - Registre du CDI</title>

	</head>
	
	<header>
		<?php include("header.php"); ?>
	</header>
	<body>
		<h2>Liste des élèves présents dans le CDI :</h2><br>
		<?php
	$connexion = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
	$requete = "SELECT * FROM statush WHERE dans_cdi = 1";
	$resultat = $connexion -> query($requete);
	echo '
	<table>
		<thead>
       	<tr>
           	<th>id_eleves</th>
           	<th>date</th>
                <th>Heure d arrivée</th>
                <th>Heure de départ</th>

       	</tr>
   		</thead>
   		<tbody>';
	while ($ligne = $resultat -> fetch()) {
           
	echo '<tr><th>' . $ligne['id_eleves'] . '</th><th>' . $ligne['datee'] . '</th><th> '. $ligne['heure_entree'] . '</th><th>' . $ligne['heure_sortie'] . '</th></tr> ';}
	echo '</table></tbody>';
?>
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br><br>
                <br>
                <br>
                <br><br><br><br>
                <br>
                
                
                <p class="note">/!\ Pour le moment, le système n'affiche que le contenu de la table statush, il reste encore à faire le lien entre cette table et la table élèves /!\</p>
	</body>
</html>