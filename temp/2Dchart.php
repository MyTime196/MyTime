
<?php

  $dir = 'sqlite:/Users/wanyu/Desktop/CS196/MyTime/temp/cs196.sqlite';
  $dbh = new PDO($dir) or die ("cannot open the database");

?>

<html>
   <head>
  	<title>MyTime Chart</title>
    <script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>
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

var width = 800,
    height = 250,
    radius = Math.min(width, height) / 2;

var color = d3.scaleLinear()
    .range([0,100]);

var arc = d3.arc()
    .outerRadius(radius - 10)
    .innerRadius(radius - 70);

var pie = d3.pie()
    .sort(null)
    .value(function (d) {
    return d.value;
});



var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

    var g = svg.selectAll(".arc")
        .data(pie(data))
        .enter().append("g")
        .attr("class", "arc");

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
        .text(function (d) {
        return d.data.value;
    });
    
    </script>
  </head>
   <body>
    <p>This is a test.</p>
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
            echo $row["TASK"];
            echo ", ";
            echo $row["DURATION"];

            echo "<br/>";
           	array_push($arrData["data"], array(
              	"label" => $row["TASK"],
              	"value" => $row["DURATION"]
              	)
           	);
        	}

          $jsonEncodedData = json_encode($arrData);
          echo $jsonEncodedData;
/*
          $fp = fopen('results.json', 'w');
          fwrite($fp, $jsonEncodedData);
          fclose($fp);
*/
          

        	// Close the database connection
        	//$dbh->close();
     	}
     //<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
  	?>
<div id="chart_div"></div>
   </body>

</html>