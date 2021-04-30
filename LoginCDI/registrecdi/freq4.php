<head>  
    <?php
   $sql = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
   $queryLundi = 'select hour(heure_entree) as h, count(id_eleves) as nb from statush where weekday(heure_entree)=0 group by hour(heure_entree)';
   $statementLundi = $sql->query($queryLundi);
   $resultsLundi = $statementLundi->fetchAll(PDO::FETCH_ASSOC);
   
   $queryMardi = 'select hour(heure_entree) as h, count(id_eleves) as nb from statush where weekday(heure_entree)=1 group by hour(heure_entree)';
   $statementMardi = $sql->query($queryMardi);
   $resultsMardi = $statementMardi->fetchAll(PDO::FETCH_ASSOC);
   
   $queryMercredi = 'select hour(heure_entree) as h, count(id_eleves) as nb from statush where weekday(heure_entree)=2 group by hour(heure_entree)';
   $statementMercredi = $sql->query($queryMercredi);
   $resultsMercredi = $statementMercredi->fetchAll(PDO::FETCH_ASSOC);
   
   $queryJeudi = 'select hour(heure_entree) as h, count(id_eleves) as nb from statush where weekday(heure_entree)=3 group by hour(heure_entree)';
   $statementJeudi = $sql->query($queryJeudi);
   $resultsJeudi = $statementJeudi->fetchAll(PDO::FETCH_ASSOC);
   
   $queryVendredi = 'select hour(heure_entree) as h, count(id_eleves) as nb from statush where weekday(heure_entree)=4 group by hour(heure_entree)';
   $statementVendredi = $sql->query($queryVendredi);
   $resultsVendredi = $statementVendredi->fetchAll(PDO::FETCH_ASSOC);
   ?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme:"light2",
	animationEnabled: true,
	title:{
		text: "Fréquentation heure par heure / jour"
	},
	axisY :{
		title: "Nombre d'élèves",
		suffix: ""
	},
	toolTip: {
		shared: "true"
	},
	legend:{
		cursor:"pointer",
		itemclick : toggleDataSeries
	},
	data: [{
		type: "spline",
		visible: true,
		showInLegend: true,
		yValueFormatString: "",
		name: "Lundi",
		dataPoints: [
			{ label: "8h", y: <?php echo intval($resultsLundi[0]['nb']); ?> },
			{ label: "9h", y: <?php echo intval($resultsLundi[1]['nb']); ?> },
			{ label: "10h", y: <?php echo intval($resultsLundi[2]['nb']); ?> },
			{ label: "11h", y: <?php echo intval($resultsLundi[3]['nb']); ?> },
			{ label: "12h", y: <?php echo intval($resultsLundi[4]['nb']); ?> },
			{ label: "13h", y: <?php echo intval($resultsLundi[5]['nb']); ?> },
			{ label: "14h", y: <?php echo intval($resultsLundi[6]['nb']); ?> },
			{ label: "15h", y: <?php echo intval($resultsLundi[7]['nb']); ?> },
			{ label: "16h", y: <?php echo intval($resultsLundi[8]['nb']); ?> },
			{ label: "17h", y: <?php echo intval($resultsLundi[9]['nb']); ?> }
		]
	},
	{
		type: "spline", 
		showInLegend: true,
		visible: true,
		yValueFormatString: "",
		name: "Mardi",
		dataPoints: [
			{ label: "8h", y: <?php echo intval($resultsMardi[0]['nb']); ?> },
			{ label: "9h", y: <?php echo intval($resultsMardi[1]['nb']); ?> },
			{ label: "10h", y: <?php echo intval($resultsMardi[2]['nb']); ?> },
			{ label: "11h", y: <?php echo intval($resultsMardi[3]['nb']); ?> },
			{ label: "12h", y: <?php echo intval($resultsMardi[4]['nb']); ?> },
			{ label: "13h", y: <?php echo intval($resultsMardi[5]['nb']); ?> },
			{ label: "14h", y: <?php echo intval($resultsMardi[6]['nb']); ?> },
			{ label: "15h", y: <?php echo intval($resultsMardi[7]['nb']); ?> },
			{ label: "16h", y: <?php echo intval($resultsMardi[8]['nb']); ?> },
			{ label: "17h", y: <?php echo intval($resultsMardi[9]['nb']); ?> }
		]
	},
	{
		type: "spline",
		visible: true,
		showInLegend: true,
		yValueFormatString: "",
		name: "Mercredi",
		dataPoints: [
			{ label: "8h", y: <?php echo intval($resultsMercredi[0]['nb']); ?> },
			{ label: "9h", y: <?php echo intval($resultsMercredi[1]['nb']); ?>  },
			{ label: "10h", y: <?php echo intval($resultsMercredi[2]['nb']); ?> },
			{ label: "11h", y: <?php echo intval($resultsMercredi[3]['nb']); ?>  },
			{ label: "12h", y: <?php echo intval($resultsMercredi[4]['nb']); ?>  },
			{ label: "13h", y: <?php echo intval($resultsMercredi[5]['nb']); ?>  },
			{ label: "14h", y: <?php echo intval($resultsMercredi[6]['nb']); ?>  },
			{ label: "15h", y: <?php echo intval($resultsMercredi[7]['nb']); ?>  },
			{ label: "16h", y: <?php echo intval($resultsMercredi[8]['nb']); ?>  },
			{ label: "17h", y: <?php echo intval($resultsMercredi[9]['nb']); ?>  }
		]
	},
	{
		type: "spline",
      	visible: true,
		showInLegend: true,
		yValueFormatString: "",
		name: "Jeudi",
		dataPoints: [
			{ label: "8h", y: <?php echo intval($resultsJeudi[0]['nb']); ?>  },
			{ label: "9h", y: <?php echo intval($resultsJeudi[1]['nb']); ?> },
			{ label: "10h", y: <?php echo intval($resultsJeudi[2]['nb']); ?> },
			{ label: "11h", y: <?php echo intval($resultsJeudi[3]['nb']); ?> },
			{ label: "12h", y: <?php echo intval($resultsJeudi[4]['nb']); ?> },
			{ label: "13h", y: <?php echo intval($resultsJeudi[5]['nb']); ?> },
			{ label: "14h", y: <?php echo intval($resultsJeudi[6]['nb']); ?> },
			{ label: "15h", y: <?php echo intval($resultsJeudi[7]['nb']); ?> },
			{ label: "16h", y: <?php echo intval($resultsJeudi[8]['nb']); ?> },
			{ label: "17h", y: <?php echo intval($resultsJeudi[9]['nb']); ?> }
		]
	},
	{
		type: "spline", 
		showInLegend: true,
		yValueFormatString: "",
		name: "Vendredi",
		dataPoints: [
			{ label: "8h", y: <?php echo intval($resultsVendredi[0]['nb']); ?> },
			{ label: "9h", y: <?php echo intval($resultsVendredi[1]['nb']); ?>},
			{ label: "10h", y: <?php echo intval($resultsVendredi[2]['nb']); ?> },
			{ label: "11h", y: <?php echo intval($resultsVendredi[3]['nb']); ?> },
			{ label: "12h", y: <?php echo intval($resultsVendredi[4]['nb']); ?> },
			{ label: "13h", y: <?php echo intval($resultsVendredi[5]['nb']); ?> },
			{ label: "14h", y: <?php echo intval($resultsVendredi[6]['nb']); ?> },
			{ label: "15h", y: <?php echo intval($resultsVendredi[7]['nb']); ?> },
			{ label: "16h", y: <?php echo intval($resultsVendredi[8]['nb']); ?> },
			{ label: "17h", y: <?php echo intval($resultsVendredi[9]['nb']); ?> }
		]
	},
	
         
	]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 380px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>