            <?php
            
            $bdd = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8', 'root2', 'snbaggio%');
            $query = 'SELECT capacite FROM config';
            $statement = $bdd->query($query);
            $results = $statement->fetch();
    
            $query2 = 'SELECT COUNT(id_eleves) FROM eleves WHERE dans_cdi = 1';
            $statement2 = $bdd->query($query2);
            $results2 = $statement2->fetch();

            $occupe = 100*$results2[0]/$results[0];
            $libre = 100-$occupe;
                ?>
                
                <script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Occupation du CDI"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: <?php echo intval($libre);?>, label: "Espace disponible", color: "green"},
			{ y: <?php echo intval($occupe);?>, label: "Espace occupé", color: "red" }
		]
	}]
});
chart.render();

}
</script>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

