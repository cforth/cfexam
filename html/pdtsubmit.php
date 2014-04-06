<?php

  $exam_db = "tzfx";
  $exam_table = "pdt";
  
  include '../includes/submit.php';

  include '../includes/header.php';

?>

  <script>

    function watchdog() {
      if (document.forms.dxttj.tm.value == "")  {
         alert("题目不能为空");
         return false;
      } 
      else if (document.forms.dxttj.da.value == "") {
        alert("答案不能为空");
        return false;
      }
      
      return true;
    }

  </script>

  <h1>提交判断题</h1>

  <form action="<?php  print($_SERVER["PHP_SELF"]) ?>" method="post" name="dxttj" onsubmit="return watchdog();">
    <table>
      <tr>
        <td>判断题题目:</td>
        <td><textarea name="tm" cols="50" rows="8"></textarea></td>
      </tr>
      <tr>
        <td>判断题答案:</td>
        <td><textarea name="da" cols="50" rows="8"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit"  class="push" value="提交题目"></td>
      </tr>
    </table>      
  </form>  
  
  <a href="pdtcs.php">返回测验</a>

  <p><?php print($prompt) ?></p>
  
<?php include '../includes/footer.php'; ?>
