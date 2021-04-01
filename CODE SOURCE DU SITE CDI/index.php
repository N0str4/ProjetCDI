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
                
                
$bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');

$query2 = 'SELECT COUNT(id_eleves) FROM statush WHERE dans_cdi = 1';
$statement2 = $bdd->query($query2);
$results2 = $statement2->fetch();

$occupe = 100*$results2[0]/45;
$libre = 100-$occupe;

        
                ?>
            
            <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Occupation du CDI - 46 personnes max"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: false,
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: <?php echo round($libre, 2); ?>, label: "Espace libre", color: "green"},
			{ y: <?php echo round($occupe, 2); ?>, label: "Espace occupé", color: "red" }
		]
	}]
});
chart.render();

}
</script>
                      
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <h4><?php echo $results2[0];?></h4>
            <h3>Elèves sont présents dans le CDI</h3>
            <br><br>
            
            <p class="note">/!\ Toutes les données enregstrées sur le site sont des données de test et non des données réelles /!\</p>
   
</html>