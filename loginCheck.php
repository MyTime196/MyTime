<?php
　　header("Content-type:text/html;charset=utf-8");
$link=mysql_connect("localhost","root","207207");
if($link)
{
  $select=mysql_select_db("login",$link);
  if($select)
  {
    if(isset($_POST["subl"]))
    {
      $username=$_POST["usernamel"];
      $password=$_POST["passwordl"];
      if($username==""||$password=="")// if name or password
      {
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."请填写正确的信息！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
        exit;
      }
      $str="select password from register where username="."'"."$username"."'";
      mysql_query('SET NAMES UTF8');20       $result=mysql_query($str,$link);
      $pass=mysql_fetch_row($result);
      $pa=$pass[0];
      if($pa==$password)//check whether the password is the same as the registered password
      {
        echo"login in successfully！";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/return.html"."\""."</script>";
      }
      {
        echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."fail to login in！"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."http://127.0.0.1:8080/login.html"."\""."</script>";
      }
    }

  }
}
?>
