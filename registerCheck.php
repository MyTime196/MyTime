<?php
$link=mysql_connect("localhost","root","207207");//connect to the database
header("Content-type:text/html;charset=utf-8");
if($link)
  {
    echo"connect  database successfully!";
    $select=mysql_select_db("login",$link);//choose the database
    if($select)
    {
//choose the database successfully
      if(isset($_POST["sub"]))
      {
        $name=$_POST["username"];
        $password1=$_POST["password"];//get the data on the webpage
        $password2=$_POST["password2"];
        if($name==""||$password1=="")//determine whether it is empty
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."please enter the information！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."MyTime_SignUp.html"."\""."</script>";
          exit;
        }
        if($password1==$password2)//check the correctness of the password
        {
        $str="select count(*) from register where username="."'"."$name"."'";
        $result=mysql_query($str,$link);
        $pass=mysql_fetch_row($result);
        $pa=$pass[0];
        if($pa==1)//check whether there is a existed same username already.
        {

        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."This username has been used. Please choose another one."."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."MyTime_SignUp.html"."\""."</script>";
        exit;
        }


        $sql="insert into register values("."\""."$name"."\"".","."\""."$password1"."\"".")";//stoer the sign up info to database
        //echo"$sql";
        mysql_query($sql,$link);
        mysql_query('SET NAMES UTF8');
        $close=mysql_close($link);
        if($close)
        {
          //close the database
          echo"sign up successfully！";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."SignUpReturn.html"."\""."</script>";
        }
        }
        else
        {
          echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."the passwords you have entered are not the same！"."\"".")".";"."</script>";
          echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."MyTime_SignUp.html"."\""."</script>";
        }
      }
    }
  }
?>
