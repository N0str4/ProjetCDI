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


//PRENOM
$req = $bdd->query("SELECT id_eleves, prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE prenom_eleves LIKE '$prenom'");
 // On vérifie a quel id_eleve est le prénom entrée dans la recherche
$lignePRENOM = $req -> fetch();// On récupere donc l'id en fonction du prénom 
$reqVERIF = $bdd->query("SELECT id_eleves, datee, heure_entree, heure_sortie FROM statush WHERE id_eleves='".$lignePRENOM['id_eleves']."'"); 
$ligneID = $reqVERIF -> fetch();

// NOM 
$req2 = $bdd->query("SELECT id_eleves, prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE nom_eleves LIKE '$nom'");
 // On vérifie a quel id_eleve est le prénom entrée dans la recherche
$lignePRENOM2 = $req2 -> fetch();// On récupere donc l'id en fonction du prénom 
$reqVERIF2 = $bdd->query("SELECT id_eleves, datee, heure_entree, heure_sortie FROM statush WHERE id_eleves='".$lignePRENOM2['id_eleves']."'"); 
$ligneID2 = $reqVERIF2 -> fetch();

//Classe
$req3 = $bdd->query("SELECT id_eleves, prenom_eleves, nom_eleves, sexe_eleves, classe_eleves, NbrDeVenu FROM eleves WHERE nom_eleves LIKE '$classe'");
 // On vérifie a quel id_eleve est le prénom entrée dans la recherche
$lignePRENOM3 = $req3 -> fetch();// On récupere donc l'id en fonction du prénom 
$reqVERIF3 = $bdd->query("SELECT id_eleves, datee, heure_entree, heure_sortie FROM statush WHERE id_eleves='".$lignePRENOM3['id_eleves']."'"); 
$ligneID3 = $reqVERIF3 -> fetch();








echo "<br>";
echo "<br>";
echo "<br>";
echo '
	<table>
		<thead>
       	<tr>
           	<th>Nom</th>
           	<th>Prénom</th>
           	<th>Classe</th>
            <th>Heure entrée</th>
            <th>Heure sortie</th>
       	</tr>
   		</thead>
   		<tbody>';
		   
	if ($prenom != ""){ // TEST SI PRENOM EST VIDE ALORS ON AFFICHE PAS
	echo '<tr><th>' . $lignePRENOM['nom_eleves'] . '</th><th>' . $lignePRENOM['prenom_eleves'] . '</th><th> ' . $lignePRENOM['classe_eleves'] . '</th><th> '. $ligneID['heure_entree']  . '</th><th> '. $ligneID['heure_sortie']  . '</th></tr> ';}
    if ($nom != ""){ // TEST SI NOM EST VIDE ALORS ON AFFICHE PAS
    echo '<tr><th>' . $lignePRENOM2['nom_eleves'] . '</th><th>' . $lignePRENOM2['prenom_eleves'] . '</th><th> ' . $lignePRENOM2['classe_eleves'] . '</th><th> '. $ligneID2['heure_entree']  . '</th><th> '. $ligneID2['heure_sortie']  . '</th></tr> ';}
    if ($classe != ""){ // TEST SI NOM EST VIDE ALORS ON AFFICHE PAS
    echo '<tr><th>' . $lignePRENOM3['nom_eleves'] . '</th><th>' . $lignePRENOM3['prenom_eleves'] . '</th><th> ' . $lignePRENOM3['classe_eleves'] . '</th><th> '. $ligneID3['heure_entree']  . '</th><th> '. $ligneID3['heure_sortie']  . '</th></tr> ';}





    echo '</table></tbody>';
	

?>
	</body>

</html>