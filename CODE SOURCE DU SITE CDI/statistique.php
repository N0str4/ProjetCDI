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
		<?php include("menu.php"); ?>
		<form method="post">
        Rechercher un utilisateur par son prénom : <input type="text" name="prenom"/>
        <br>
        Rechercher un utilisateur par son nom : <input type="text" name="nom"/>
        <br>
        Rechercher une classe : <input type="text" name="classe"/>
        <input type="submit" value="Rechercher"/>
        </form>

        <?php 

$bdd = new PDO('mysql:host=va601736-001.privatesql;port=35226;dbname=Projet;charset=utf8', 'Projet', 'Snbaggio59');
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$classe = $_POST['classe'];

$req = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, heure_entree, NbrDeVenu FROM eleves WHERE prenom_eleves='$prenom'");
$reqV1 = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, heure_entree, NbrDeVenu FROM eleves WHERE nom_eleves='$nom'");   
$reqV2 = $bdd->query("SELECT prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, heure_entree, NbrDeVenu FROM eleves WHERE classe_eleves='$classe'");    
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
	while ($ligne = $req -> fetch()) {
	echo '<tr><th>' . $ligne['nom_eleves'] . '</th><th>' . $ligne['prenom_eleves'] . '</th><th> ' . $ligne['sexe_eleves'] . '</th><th> '. $ligne['classe_eleves'] . '</th><th> '. $ligne['NbrDeVenu']  . '</th></tr> ';}

    while ($ligneV1 = $reqV1 -> fetch()) {
    echo '<tr><th>' . $ligneV1['nom_eleves'] . '</th><th>' . $ligneV1['prenom_eleves'] . '</th><th> ' . $ligneV1['sexe_eleves'] . '</th><th> '. $ligneV1['classe_eleves'] . '</th><th> '. $ligneV1['NbrDeVenu']  . '</th></tr> ';}
    while ($ligneV2 = $reqV2 -> fetch()) {
            echo '<tr><th>' . $ligneV2['nom_eleves'] . '</th><th>' . $ligneV2['prenom_eleves'] . '</th><th> ' . $ligneV2['sexe_eleves'] . '</th><th> '. $ligneV2['classe_eleves'] . '</th><th> '. $ligneV2['NbrDeVenu']  . '</th></tr> ';}
    echo '</table></tbody>';
    

?>
	</body>
	<footer>
		<?php include("footer.php"); ?>
	</footer>

</html>