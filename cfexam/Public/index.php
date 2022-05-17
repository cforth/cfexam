<?php 
  session_start();
  require '../resources/view/header.php';

?>

  <h1>随机测验</h1>
  
  <?php if(isset($_SESSION["authenticated"])) { ?>
 
 <h2>欢迎您, !</h2>
  <ul>
    <li><a href="dxtcs.php">单选题题目</a></li>
    <li><a href="tktcs.php">填空题测试</a></li>
    <li><a href="pdtcs.php">判断题测试</a></li>
    <li><a href="logout.php">注销登录</a></li>
  </ul>

  <?php } else { 
 // <h2>请登录用户！</h2>
  //<ul>
    //<li><a href="login.php">用户登陆</a></li>
//    <li><a href="register.php">用户注册</a></li>
 // </ul>
    $host = $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host$path/login/login.php");
    
  } ?>
  
<?php
  require '../resources/view/footer.php'; 

?>
