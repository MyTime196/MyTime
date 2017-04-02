<?php

    define('DB_HOST', 'localhost');//codes for link mysql
    define('DB_USER', 'renfei');
    define('DB_PASS', 'root');
    define('DB_NAME', 'database_name');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $query = "INSERT INTO table_name (column1, column2) VALUES ('value1', 'value2')";

    mysqli_query($dbc, $query);

?>



<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);//codes for sign up

    if (!empty($user) && !empty($info)) {//no empty info
        if (isset($_POST['submit'])) { //we upload the info in database after submitting
            $user = $_POST['username'];
            $info = $_POST['info'];
            $query = "INSERT INTO table_name (tb_user, tb_info) VALUES ('$user', '$info')";
            mysqli_query($dbc, $query);
            echo "<p>you have submitted successfully!</p>";
            mysqli_close($dbc);
        }
    }
    else{
        echo "Please complete all information!";
    }


?>










<script type="text/javascript">
//var color = getColor();["#27255F","#2F368F","#3666B0","#2CA8E0","#77D1F6"];
//var data = [5,30,15,30,20];v

var color = getColor();
var data = getData();

function getData(){
//get all data on duration into a list
//change all duration in to percent, that the total sum is 100
//create a new list, that contains all of percent of duration data
//return to drawCircle function
}

function getColor(){
//create a long list of color
//create a new list that stores colors
//according to the number of events, we use a for loop to randomly determine the color of the event
//then we put the color into the list
//there is a if statment to make sure colors are not repeated
//return the color list
}

function drawCircle(){
    var canvas = document.getElementById("circle");
    var ctx = canvas.getContext("2d");
    var startPoint=0;
    for(var i=0;i<data.length;i++){
        ctx.fillStyle = color[i];
        ctx.beginPath();
        ctx.moveTo(200,150);
        ctx.arc(200,150,150,startPoint,startPoint+Math.PI*2*(data[i]/100),false);
        ctx.fill();
        startPoint+=Math.PI*2*(data[i]/100);
    }
}
drawCircle();
</script>

<?php
echo "<script type='text/javascript'>test();</script>";
?>
