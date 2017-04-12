<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

class MyDB extends SQLite3{
	function _construct(){
		$this->open(‘CS1962.db’);
		}
	}
}
$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
}  else{
    echo "Opened database successfully\n";
}

$sql =<<<EOF
	SELECT * FROM MYTIME WHERE id = '".$q."'
EOF;

$ret = $db->query($sql);






echo "<table>
<tr>
<th>TASK</th>
<th>TAG</th>
<th>DURATION</th>
<th>DATE</th>

</tr>";

while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo "<tr>";
    echo "<td>" . $row['TASK'] . "</td>";
    echo "<td>" . $row['TAG'] . "</td>";
    echo "<td>" . $row['DURATION'] . "</td>";
    echo "<td>" . $row['DATE'] . "</td>";
   
    echo "</tr>";
}
echo "</table>";
$db->close();
?>
</body>
</html>