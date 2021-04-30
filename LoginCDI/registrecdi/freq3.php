<head>
    
    <?php
    $sql = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
   $query = 'select weekday(datee) as w, count(id_eleves) as nb from statush where week(datee)=week(now()) group by weekday(datee)';
   $statement = $sql->query($query);
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Fréquentation jour par jour"
	},
	axisY: {
		title: "Nombre d'élèves",
		suffix: ""
	},
	axisX: {
	},
	data: [{
		type: "column",
		yValueFormatString: "",
		dataPoints: [
			{ label: "Lundi", y: <?php echo intval($results[0]['nb']); ?> },	
			{ label: "Mardi", y: <?php echo intval($results[1]['nb']); ?> },	
			{ label: "Mercredi", y: <?php echo intval($results[2]['nb']); ?> },
			{ label: "Jeudi", y: <?php echo intval($results[3]['nb']); ?> },	
			{ label: "Vendredi", y:<?php echo intval($results[4]['nb']); ?> }
			
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 380px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>