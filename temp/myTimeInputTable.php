<html>
<body>
 
 
<?php
class MyDB extends SQLite3{
	function _construct(){
		$this->open('CS1962.db');
		}
	}


$dir = 'sqlite:/Users/wanyu/Desktop/CS196/MyTime/temp/cs196.sqlite';
$dbh = new PDO($dir) or die ("cannot open the database");
$query = "INSERT INTO CS1962 (ID, TASK, TAG, DURATION, DATE)
VALUES
($_POST[id], '$_POST[task]','$_POST[tag]', $_POST[duration],'$_POST[date]')";
$dbh->query($query);
echo "RECORD ADDED"; //make text bigger

//foreach ($dbh as query($query) as $row) {
	# code...
//}

 

 

 

?>
</body>
</html>
 