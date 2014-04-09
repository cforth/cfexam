<?php 

session_start();

if(isset($_SESSION["authenticated"])) {

  if (($connection = mysql_connect("localhost", "cf", "123456")) === false)
    die("Could not connect to database");

  if (mysql_select_db($exam_db, $connection) === false)
    die("Could not select database");

  mysql_query("set names utf8");
    
  $sql = sprintf("SELECT * FROM `%s` ORDER BY RAND() LIMIT 0,1;", $exam_table);

  $sql_result = mysql_query($sql);
  if (mysql_num_rows($sql_result) == 1) { 
    $rows = mysql_fetch_array($sql_result);
    print("<div class=\"wordbreak\"><pre>(" . $rows["id"]  . ")" . $rows["question"] . "</pre></div><button type=\"button\" id =\"xs\">点击显隐答案</button> <input type=\"button\" value=\"换一题\" onclick= \"window.location.reload();\"> <div id=\"da\" class=\"wordbreak\" style=\"display:none;\"><pre>" . $rows["answer"] . "</pre></div>" );
  } 
  else {
    print("<br/>题目获取失败！");
  }

} else {
    $host = $_SERVER["HTTP_HOST"];
    $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host$path/index.php");
    exit;
}
?>
