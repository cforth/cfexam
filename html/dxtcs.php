<?php 

  if (($connection = mysql_connect("localhost", "cf", "123456")) === false)
    die("Could not connect to database");

  if (mysql_select_db("cfexam", $connection) === false)
    die("Could not select database");
    
  
  include '../includes/header.php';

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

  $sql = sprintf("SELECT * FROM `dxt_num` WHERE `id` = 1;");

  $sql_result = mysql_query($sql);
  if (mysql_num_rows($sql_result) == 1) { 
    $rows = mysql_fetch_array($sql_result);
    $dxt_num = $rows["num"];
  }
  else {
    print("<br/>题号获取失败！<br/>");
  }
    
  $sql = sprintf("SELECT * FROM `dxt` WHERE `id` = %d;", $dxt_num);

  $sql_result = mysql_query($sql);
  if (mysql_num_rows($sql_result) == 1) { 
    $rows = mysql_fetch_array($sql_result);
    print("<div class=\"wordbreak\"><pre>(" . $rows["id"]  . ")" . $rows["question"] . "<br/>A. " . $rows["a"]. "<br/>B. " . $rows["b"] . "<br/>C. " . $rows["c"] . "<br/>D. " . $rows["d"] . "</pre></div><button type=\"button\" id =\"xs\">点击显隐答案</button> <input type=\"button\" value=\"换一题\" onclick= \"window.location.reload();\"> <div id=\"da\" class=\"wordbreak\" style=\"display:none;\"><pre>" . $rows["remark"] . "</pre></div>" );
 
    if ($dxt_num < 2) {
      $sql = sprintf("UPDATE `dxt_num` SET `num` = %d WHERE `id` = 1;", $dxt_num + 1);
      $sql_result = mysql_query($sql);
      if ($sql_result == false) { 
        print("<br/>题号更新失败！<br/>");
      }
    }
  } 
  else {
    print("<br/>题目获取失败！");
  }
?>
 <br/>

  
<?php
  include '../includes/footer.php'; 
?>
