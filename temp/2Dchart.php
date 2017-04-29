
<?php

 $dir = 'sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/cs196.sqlite';
    echo ".";
  $dbh = new PDO($dir) or die ("cannot open the database");
?>

<html>
   <head>
  	<title>MyTime Chart</title>
    <script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>
    <script src="d3-tip.js"></script>
    <script type="text/javascript">
        var dataFromYou = [{
  "data":[
    {"label":"ART","value":"10"},
    {"label":"HIST","value":"10"},
    {"label":"breakfast","value":"10"},
    {"label":"Spanish","value":"18"},
    {"label":"LUNCH","value":"40"},
    {"label":"MATH","value":"120"},
    {"label":"ENGLISH","value":"120"},
    {"label":"Dinner","value":"120"},
    {"label":"sleep","value":"190"}
  ]
}];

var data = dataFromYou[0].data;
console.log(dataFromYou[0].data);

var width = 500,
    height = 500,
    radius = Math.min(width, height) / 2;

var color = d3.scaleOrdinal(["#393b79", "#5254a3", "#6b6ecf", "#9c9ede"]);

var arc = d3.arc()
    .outerRadius(radius - 10)
    .innerRadius(radius - 100);

var pie = d3.pie()
    .sort(null)
    .value(function (d) {
    return d.value;
});

var tip = d3.tip()
    .attr("class","d3-tip")
    .html(function(d) {
        var htmlString = "<div align=\"center\" style='background-color:grey; color:white; padding:10px; border-radius:5px; font-family:Arial'>";
        htmlString += d.data.label + "<br>";
        htmlString += String(d.data.value) + " minutes";
        htmlString += "</div>";
        return htmlString;

    });


var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
    .attr("font-family", "Arial")
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

    //add mouseover
    svg.call(tip);
    
    var g = svg.selectAll(".arc")
        .data(pie(data))
        .enter().append("g")
        .attr("class", "arc")
        .on('mouseover', tip.show)
        .on('mouseout', tip.hide);

    g.append("path")
        .attr("d", arc)
        .style("fill", function (d) {
        return color(d.data.label);
    });

    g.append("text")
        .attr("transform", function (d) {
        return "translate(" + arc.centroid(d) + ")";
    })
        .attr("dy", ".35em")
        .style("text-anchor", "middle")
        .style("fill", "white")
        .text(function (d) {
            return d.data.value;
    });
    
    </script>
  </head>
   <body style="margin: 200px; color:white">
    <?php
     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT DURATION, TASK FROM CS1962 ORDER BY DURATION";

     	// Execute the query, or else return the error message.
     	$result = $dbh->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}"); 

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "MyTime",
                  "showValues" => "0",
                  "theme" => "zune"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	foreach($dbh->query($strQuery) as $row) {

           	array_push($arrData["data"], array(
              	"label" => $row["TASK"],
              	"value" => $row["DURATION"]
              	)
           	);
        	}
          $jsonEncodedData = json_encode($arrData);
          $fp = fopen('results.json', 'w');
          fwrite($fp, $jsonEncodedData);
          fclose($fp);
          

        	// Close the database connection
        	//$dbh->close();
     	}

  	?>
   </body>

</html>
