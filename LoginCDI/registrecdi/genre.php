<?php
		$bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
		// STATISTIQUE HOMME 
		$req = $bdd->query("SELECT  COUNT(*) as Inform FROM eleves WHERE sexe_eleves=1 AND dans_cdi = 1 " );

		$donnees = $req->fetch();
		$req->closeCursor();

		// STATISTIQUE FEMMES 
		$reqV2 = $bdd->query("SELECT  COUNT(*) as Inform FROM eleves WHERE sexe_eleves=0 AND dans_cdi = 1  " );

		$donneesV2 = $reqV2->fetch();
		$reqV2->closeCursor();

		// STATISTIQUE FEMMES 
		$reqV3 = $bdd->query("SELECT  COUNT(*) as Inform FROM eleves WHERE sexe_eleves=2 AND dans_cdi = 1  " );

		$donneesV3 = $reqV3->fetch();
		$reqV3->closeCursor();

	$total = $donnees['Inform'] + $donneesV2['Inform'] + $donneesV3['Inform'];
	$calcHomme = 100*$donnees['Inform']/$total;
	$calcFemme = 100*$donneesV2['Inform']/$total;
	$calcAutre = 100*$donneesV3['Inform']/$total;

	//round ( float $calcHomme , int $precision = 2 , int $mode = PHP_ROUND_HALF_UP ) : float;
	//round ( float $calcFemme , int $precision = 2 , int $mode = PHP_ROUND_HALF_UP ) : float;
?>

<!-- 
https://www.lememento.fr/calcul-pourcentage - pour calculer le pourcentage d'hommes et de femmes
 -->
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContaineractuel", {
	animationEnabled: true,
	title:{
		text: "Répartition par genres - actuellement dans le CDI",
		horizontalAlign: "center"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: <?php echo $calcHomme ?>, label: "Hommes" },
			{ y: <?php echo $calcFemme ?>, label: "Femmes" },
			{ y: <?php echo $calcAutre ?>, label: "Autres" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContaineractuel" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>