<?php 

  $exam_db = "tzfx";
error_reporting(E_ALL ^ E_DEPRECATED);
  $exam_table = "pdt";

  include '../../resources/view/header.php';

?>

<script>
  $(document).ready(function(){
    $("#xs").click(function(){
      $("#da").toggle();
    });
  });
</script>

  <h1>判断题测试</h1>
  <a href="index.php">返回主页</a>
  <a href="admin/pdtsubmit.php">提交题目</a>


<?php
  include '../../app/Controllers/cs.php';
?>
 <br/>

  
<?php
  include '../../resources/view/footer.php'; 

?>
