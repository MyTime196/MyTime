<?php

 $dir = 'sqlite:/Users/wanyu/Desktop/CS196/MyTime/temp/cs196.sqlite';
    
 $dbh = new PDO($dir) or die ("cannot open the database");



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