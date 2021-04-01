 <form method="post">
                <p>Changer la capacité du CDI : <input type="number" name="capacite" placeholder="TEST" required/>
                <input type="submit" value="Envoyer" /></p>
               

                <p>Capacité actuelle : <?php echo $results[0];?></p>
<?php
                
                $capacite = $_POST['capacite'];
                if(!empty($capacite)){
                   $bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
$req = $bdd->prepare('UPDATE config SET capacite = :capacite');
$req->bindParam(':capacite',$capacite);
$req->execute(); 
                }
               
$query = 'SELECT capacite FROM config';
            $statement = $bdd->query($query);
            $results = $statement->fetch();
            var_dump($results);         
?>


