<head>  
   <?php
   $sql = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
   $query = 'select month(datee) as m, count(id_eleves) as nb from statush where year(datee)=year(now()) group by month(datee)';
   $statement = $sql->query($query);
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Fréquentation mensuelle"
	},
	axisY: {
		title: "Nombre d'élèves"
	},
	data: [{        
		type: "column",  
		showInLegend: false, 
		legendMarkerColor: "grey",
		dataPoints: [      
			{ y: <?php echo intval($results[0]['nb']); ?>, label: "Janvier" },
			{ y: <?php echo intval($results[1]['nb']); ?>,  label: "Fevrier" },
			{ y: <?php echo intval($results[2]['nb']); ?>,  label: "Mars" },
			{ y: <?php echo intval($results[3]['nb']); ?>,  label: "Avril" },
			{ y: <?php echo intval($results[4]['nb']); ?>,  label: "Mai" },
			{ y: <?php echo intval($results[5]['nb']); ?>, label: "Juin" },
			{ y: null,  label: "Juillet" },
			{ y: null,  label: "Août" },
                        { y: <?php echo intval($results[8]['nb']); ?>,  label: "Septembre" },
                        { y: <?php echo intval($results[9]['nb']); ?>,  label: "Octobre" },
                        { y: <?php echo intval($results[10]['nb']); ?>,  label: "Novembre" },
                        { y: <?php echo intval($results[11]['nb']); ?>,  label: "Décembre" }
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