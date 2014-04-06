<?php 

  $exam_db = "tzfx";

  $exam_table = "duo";

  include '../includes/header.php';

?>

<script>
  $(document).ready(function(){
    $("#xs").click(function(){
      $("#da").toggle();
    });
  });
</script>

  <h1>多选题测试</h1>
  <a href="index.php">返回主页</a>
  <a href="duosubmit.php">提交题目</a>


<?php
  include '../includes/cs.php';
?>
 <br/>

  
<?php
  include '../includes/footer.php'; 

?>
