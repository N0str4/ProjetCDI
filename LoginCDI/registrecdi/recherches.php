<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="MiseEnPage.css" />
		<title>Recherches - Registre du CDI</title>

	</head>
	
	<header>
		<?php include("header.php"); ?>
	</header>
	<body>
		<form method="post">
        Rechercher un utilisateur par son prénom : <input type="text" name="prenom"/>
        <br>
        Rechercher un utilisateur par son nom : <input type="text" name="nom"/>
        <br>
        Rechercher une classe : <input type="text" name="classe"/>
		<br>
		Rechercher en un jour : <input type="text" name="date" placeholder="AAAA-MM-JJ"/>
        <input type="submit" value="Rechercher"/>
        </form>

        <?php 
// SCRIPT PHP BY
// BY AYMERICK 
// DO NOT COPY
$bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$classe = $_POST['classe'];
$date = $_POST['date'];

$req = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE prenom_eleves LIKE '$prenom%'");
$reqV1 = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE nom_eleves LIKE '$nom%'");   
$reqV2 = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE classe_eleves LIKE '$classe%'");  
$reqV3 = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE datee LIKE '$date%'");    



echo "<br>";
echo "<br>";
echo "<br>";
echo '
	<table>
		<thead>
       	<tr>
           	<th>Nom</th>
           	<th>Prénom</th>
           	<th>Sexe</th>
           	<th>Classe</th>
            <th>Nombre de venu total</th>
       	</tr>
   		</thead>
   		<tbody>';
		   
	if ($prenom != ""){ // TEST SI PRENOM EST VIDE ALORS ON AFFICHE PAS
	while ($ligne = $req -> fetch()) {
		if ($ligne['sexe_eleves'] == 2) {
			$sexe ='Autre';
		}
		if ($ligne['sexe_eleves'] == 1) {
			$sexe ='Homme';
		}
		if ($ligne['sexe_eleves'] == 0) {
			$sexe ='Femme';
		}
		
	echo '<tr><th>' . $ligne['nom_eleves'] . '</th><th>' . $ligne['prenom_eleves'] . '</th><th> ' . $sexe . '</th><th> '. $ligne['classe_eleves'] . '</th><th> '. $ligne['NbrDeVenu']  . '</th></tr> ';}}
	if ($date != ""){// TEST SI DATE EST VIDE ALORS ON AFFICHE PAS
	while ($ligneV3 = $reqV3 -> fetch()) {
		if ($ligneV3['sexe_eleves'] == 2) {
			$sexe ='Autre';
		}
		if ($ligneV3['sexe_eleves'] == 1) {
			$sexe ='Homme';
		}
		if ($ligneV3['sexe_eleves'] == 0) {
			$sexe ='Femme';
		}
		
		echo '<tr><th>' . $ligneV3['nom_eleves'] . '</th><th>' . $ligneV3['prenom_eleves'] . '</th><th> ' . $sexe. '</th><th> '. $ligneV3['classe_eleves'] . '</th><th> '. $ligneV3['NbrDeVenu']  . '</th></tr> ';}
	}
	if ($nom != ""){ // TEST SI NOM EST VIDE ALORS ON AFFICHE PAS
    while ($ligneV1 = $reqV1 -> fetch()) {
		if ($ligneV1['sexe_eleves'] == 2) {
			$sexe ='Autre';
		}
		if ($ligneV1['sexe_eleves'] == 1) {
			$sexe ='Homme';
		}
		if ($ligneV1['sexe_eleves'] == 0) {
			$sexe ='Femme';
		}
		
    echo '<tr><th>' . $ligneV1['nom_eleves'] . '</th><th>' . $ligneV1['prenom_eleves'] . '</th><th> ' . $sexe . '</th><th> '. $ligneV1['classe_eleves'] . '</th><th> '. $ligneV1['NbrDeVenu']  . '</th></tr> ';}
	}
	if ($classe!= ""){ // TEST SI CLASSE EST VIDE ALORS ON AFFICHE PAS SI IL EST PAS VIDE, ON AFFICHE 
    while ($ligneV2 = $reqV2 -> fetch()) {
		if ($ligneV2['sexe_eleves'] == 2) {
			$sexe ='Autre';
		}
		if ($ligneV2['sexe_eleves'] == 1) {
			$sexe ='Homme';
		}
		if ($ligneV2['sexe_eleves'] == 0) {
			$sexe ='Femme';
		}
		
            echo '<tr><th>' . $ligneV2['nom_eleves'] . '</th><th>' . $ligneV2['prenom_eleves'] . '</th><th> ' . $sexe . '</th><th> '. $ligneV2['classe_eleves'] . '</th><th> '. $ligneV2['NbrDeVenu']  . '</th></tr> ';}
	}
    echo '</table></tbody>';
	

?>
	</body>

</html>