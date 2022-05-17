<?php 
  error_reporting(E_ALL ^ E_DEPRECATED);
  $exam_db = "tzfx";

  $exam_table = "duo";

  include '../../resources/view/header.php';

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
  <a href="admin/duosubmit.php">提交题目</a>


<?php
  include '../../app/Controllers/cs.php';
?>
 <br/>

  
<?php
  include '../../resources/view/footer.php'; 

?>
