<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="MiseEnPage.css" />
		<title>Ajouter un élève - Registre du CDI</title>

	</head>
	
	<header>
		<?php include("header.php"); ?>
	</header>
	<body>
		<h2>Ajouter un élève</h2>
		<form method="post">
      <br>
      <p>Nom : <input type="text" name="nom" placeholder="Entrez le nom de l'élève" /></p><br>
      <p>Prénom : <input type="text" name="prenom" placeholder="Entrez le prénom de l'élève"/></p><br>
      <p>Classe : <label for="classe"></label>
<select name="classe">
        <option>Choisir une classe</option>
    <optgroup label="Bac général">
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </optgroup>
    <optgroup label="Bac professionel">
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </optgroup>
     <optgroup label="BTS">
        <option>B1SNIR</option>
        <option>B2SNIR</option>
        <option>3</option>
    </optgroup>
     <optgroup label="Prépa">
        <option>1</option>
        <option>2</option>
        <option>3</option>
    </optgroup>
</select>
      <p><br>Sexe : <input type="radio" name="sexe" value="H"><label for="radio" >Homme </label><input type="radio" name="sexe" value="F"><label for="radio" >Femme </label><input type="radio" name="sexe" value="A"><label for="radio" >Autre </label></p><br>
      <p>N° de carte : <input type="text" name="carte" placeholder="numéro de carte de l'élève"/></p><br>
      <input type="submit" value="Envoyer" />
      
      <?php
  // Vérifie qu'il provient d'un formulaire



$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$classe = $_POST['classe'];
$sexe = $_POST['sexe'];
$carte = $_POST['carte'];



if ($sexe == 'H') {
 $sexe = 1;
}

if ($sexe == 'F') {
 $sexe = 0;
}

if ($sexe == 'A') {
 $sexe = 2;
}


try{
$bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%', [ 
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,] );

$req = $bdd->prepare('INSERT INTO eleves (nom_eleves, prenom_eleves, sexe_eleves, classe_eleves, carte_eleves) VALUES(:nom, :prenom, :sexe, :classe, :carte)');
$req->bindParam(':prenom',$prenom);
        $req->bindParam(':nom',$nom);
        $req->bindParam(':classe',$classe);
        $req->bindParam(':sexe',$sexe);
        $req->bindParam(':carte',$carte);
        $req->execute();
echo '<br>';
echo "Félicitation, l'éleve a été ajouté";
}
catch(Exception $e){
  echo '<br><br>';
    echo 'Impossible de traiter les données. !! Le Numéro de carte est déjà inscrit. !! ';
    echo '<br>';
    echo 'Veuillez recommencer le formulaire';
    echo "<br>";
    }

?>





    </form>
    <p class="note">/!\ La page ajoutereleves ne fonctionne plus depuis la migration et la séparation des tables élèves et statush - fix en cours /!\</p>

	</body>


</html>