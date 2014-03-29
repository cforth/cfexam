<?php 

  if (($connection = mysql_connect("localhost", "cf", "123456")) === false)
    die("Could not connect to database");

  if (mysql_select_db("cfexam", $connection) === false)
    die("Could not select database");
    
  
  require 'header.php';

?>

<script>
  $(document).ready(function(){
    $("#xs").click(function(){
      $("#da").toggle();
    });
  });
</script>

  <h1>单选题测试</h1>
  <a href="index.php">返回主页</a>
  <a href="dxtsubmit.php">提交题目</a>


<?php
  mysql_query("set names utf8");
    
  $sql = sprintf("SELECT * FROM `dxt` ORDER BY RAND() LIMIT 0,1;");

  $sql_result = mysql_query($sql);
  if (mysql_num_rows($sql_result) == 1) { 
    $rows = mysql_fetch_array($sql_result);
    print("<div class=\"wordbreak\"><pre>(" . $rows["id"]  . ")" . $rows["question"] . "<br/>A. " . $rows["a"]. "<br/>B. " . $rows["b"] . "<br/>C. " . $rows["c"] . "<br/>D. " . $rows["d"] . "</pre></div><button type=\"button\" id =\"xs\">点击显隐答案</button> <input type=\"button\" value=\"换一题\" onclick= \"window.location.reload();\"> <div id=\"da\" class=\"wordbreak\" style=\"display:none;\"><pre>" . $rows["remark"] . "</pre></div>" );
  } 
  else {
    print("<br/>题目获取失败！");
  }
?>
 <br/>

  
<?php
  require 'footer.php'; 

?>
