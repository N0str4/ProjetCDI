

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
                <?php
        
        
        /*$query = 'select count(*) as nb from `eleves` where month(`datee`) =:m and year(`datee`)=year(now())';
        $statement = $sql->prepare($query);
        
        $results = [];
        for($i = 0; $i <= 11; $i++){
            $statement->bindValue('m', $i);
            $statement->execute();
            $results[$i] = $statement->fetch(PDO::FETCH_ASSOC);
        }  
        var_dump($results);*/
?>
	</body>
	<footer>
		<?php include("footer.php"); ?>
	</footer>

</html>