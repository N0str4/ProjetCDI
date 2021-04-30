<head>  
      <?php
                
                $bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
        $query = 'select month(`datee`) as m, '
        . 'count(`id_eleves`) as nb '
        . 'from `eleves` '
        . 'where year(`datee`)=year(now()) '
        . 'group by month(`datee`)';
        $statement = $sql->query($query);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
                ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	title:{
		text: "Fréquentation mensuelle"   
	},
	axisX: {
		interval: 1,
		intervalType: "month",
		valueFormatString: "MMM"
	},
	axisY:{
		title: "Nombre d'élèves",
		includeZero: true,
		valueFormatString: "#0"
	},
	data: [{        
		type: "line",
		markerSize: 12,
		xValueFormatString: "MMM, YYYY",
		yValueFormatString: "###.#",
		dataPoints: [
                    
                    
                        { x: new Date(2021, 0, 1), y: <?php echo intval($results[0]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 01, 1), y: <?php echo intval($results[1]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 02, 1) , y: <?php echo intval($results[2]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 03, 1) , y: <?php echo intval($results[3]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 04, 1) , y: <?php echo intval($results[4]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 05, 1) , y: <?php echo intval($results[5]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 06, 1) , y: <?php echo intval($results[6]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 07, 1) , y: <?php echo intval($results[7]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 08, 1) , y: <?php echo intval($results[8]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato"},
			{ x: new Date(2021, 09, 1) , y: <?php echo intval($results[9]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 10, 1) , y: <?php echo intval($results[10]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2021, 11, 1) , y: <?php echo intval($results[11]['nb']); ?>, indexLabel: "", markerType: "cross", markerColor: "tomato" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
    <h1>Test freq2</h1>
<div id="chartContainer" style="height: 380px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>