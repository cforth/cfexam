<?php

session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

$prompt=" ";
  
if(isset($_SESSION["authenticated"])) {

  if (($connection = mysql_connect("localhost", "cf", "123456")) === false)
    die("Could not connect to database");

  if (mysql_select_db($exam_db, $connection) === false)
    die("Could not select database");
    
  if (isset($_POST["tm"]) && isset($_POST["da"])) {
    mysql_query("set names utf8");
      
    $sql = sprintf("INSERT INTO `%s` (`question`, `answer`) VALUES ('%s', '%s')",
      $exam_table,
      mysql_real_escape_string($_POST["tm"]),
      mysql_real_escape_string($_POST["da"]));

    $sql_insert = mysql_query($sql);
    if ($sql_insert === false) { 
      $prompt ="<br/>提交失败！";
    } 
    else {
      $prompt = "<br/>提交成功！";
    }

  }
 
} else {
    $host = $_SERVER["HTTP_HOST"];
    $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host/index.php");
    exit;
}
?>

