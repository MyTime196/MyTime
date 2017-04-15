<DOCTYPE html>
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



$dir = 'sqlite:/Users/wanyu/Desktop/CS196/MyTime/temp/cs196.sqlite';
$dbh = new PDO($dir) or die ("cannot open the database");

$query = "SELECT * FROM CS1962";
//foreach ($dbh->query($query) as $row) {
//for (int i = 0; i < 1000; i ++ ) {
//	echo "this was found at index"+ i;
echo '<table>
  <tr>
      <th>TASK</th>
      <th>TAG</th>
      <th>DURATION</th>
      <th>DATE</th>
  </tr>';
	//echo \n;	
foreach ($dbh->query($query) as $row) {
  echo '
        <tr>
            <td>'.$row['TASK'].'</td>
            <td>'.$row['TAG'].'</td>
            <td>'.$row['DURATION'].'</td>
            <td>'.$row['DATE'].'</td>
        </tr>';
}

//{
//echo "table disappeared!?!?!?!";
//echo $row[0];
//echo $row[1];
//echo "no data we're done";
//}

#$db = new MyDB();
#if(!$db){
#	echo $db->lastErrorMsg();
#}  else{
 #   echo "Opened database successfully\n";
#}

#$sql =<<<EOF
#	SELECT * FROM MYTIME WHERE id = '".$q."'
#EOF;

#$ret = $db->query($sql);






#echo "<table>
#<tr>
#<th>TASK</th>
#<th>TAG</th>
#<th>DURATION</th>
#<th>DATE</th>

#</tr>";

#while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
 #   echo "<tr>";
  #  echo "<td>" . $row['TASK'] . "</td>";
  #  echo "<td>" . $row['TAG'] . "</td>";
   # echo "<td>" . $row['DURATION'] . "</td>";
  #  echo "<td>" . $row['DATE'] . "</td>";
   
  #  echo "</tr>";
#}
#echo "</table>";
#$db->close();
?>
</body>
</html>
