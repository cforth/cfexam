<?php 

  $prompt=" ";
  
  if (($connection = mysql_connect("localhost", "cf", "123456")) === false)
    die("Could not connect to database");

  if (mysql_select_db("cfexam", $connection) === false)
    die("Could not select database");
    
  if (isset($_POST["question"]) && isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["c"]) && isset($_POST["d"]) && isset($_POST["answer"]) && isset($_POST["remark"])) {
    mysql_query("set names utf8");
      
    $sql = sprintf("INSERT INTO `dxt` (`question`, `a`, `b`, `c`, `d`, `answer`, `remark`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
      mysql_real_escape_string($_POST["question"]),
      mysql_real_escape_string($_POST["a"]),
      mysql_real_escape_string($_POST["b"]),
      mysql_real_escape_string($_POST["c"]),
      mysql_real_escape_string($_POST["d"]),
      mysql_real_escape_string($_POST["answer"]),
      mysql_real_escape_string($_POST["remark"]));

    $sql_insert = mysql_query($sql);
    if ($sql_insert === false) { 
      $prompt ="<br/>提交失败！";
    } 
    else {
      $prompt = "<br/>提交成功！";
    }

  } 
  
  include '../includes/header.php';

?>

  <script>

    function watchdog() {
      if (document.forms.dxttj.question.value == "")  {
         alert("题目不能为空");
         return false;
      } 
      else if (document.forms.dxttj.a.value == "") {
        alert("选项A不能为空");
        return false;
      }
      else if (document.forms.dxttj.b.value == "") {
        alert("选项B不能为空");
        return false;
      }
      else if (document.forms.dxttj.c.value == "") {
        alert("选项C不能为空");
        return false;
      }
      else if (document.forms.dxttj.d.value == "") {
        alert("选项D不能为空");
        return false;
      }
      else if (document.forms.dxttj.answer.value == "") {
        alert("答案不能为空");
        return false;
      }
      else if (document.forms.dxttj.remark.value == "") {
        alert("解析不能为空");
        return false;
      } 
      return true;
    }

  </script>

  <h1>提交单选题</h1>

  <form action="<?php  print($_SERVER["PHP_SELF"]) ?>" method="post" name="dxttj" onsubmit="return watchdog();">
    <fieldset>
      <legend>单选题</legend>
    <table>
      <tr>
        <td>单选题题目:</td>
        <td><textarea name="question" cols="50" rows="3"></textarea></td>
      </tr>
      <tr>
        <td>单选题选项A:</td>
        <td><textarea name="a" cols="50" rows="1"></textarea></td>
      </tr>
      <tr>
        <td>单选题选项B:</td>
        <td><textarea name="b" cols="50" rows="1"></textarea></td>
      </tr>
      <tr>
        <td>单选题选项C:</td>
        <td><textarea name="c" cols="50" rows="1"></textarea></td>
      </tr>
      <tr>
        <td>单选题选项D:</td>
        <td><textarea name="d" cols="50" rows="1"></textarea></td>
      </tr>
      <tr>
        <td>单选题答案:</td>
        <td><textarea name="answer" cols="50" rows="1"></textarea></td>
      </tr>
      <tr>
        <td>单选题解析:</td>
        <td><textarea name="remark" cols="50" rows="3"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit"  class="push" value="提交题目"></td>
      </tr>
    </table>      
  </fieldset>
  </form>  
  
  <a href="dxtcs.php">返回测验</a>

  <p><?php print($prompt) ?></p>
  
<?php
  include '../includes/footer.php'; 
?>
