<?php
// enable sessions
  session_start();
  error_reporting(E_ALL ^ E_DEPRECATED);
  $prompt = " ";

  // if username and password were submitted, check them
  if (isset($_POST["user"]) && isset($_POST["pass"]))
  {

      // connect to database
      if (($connection = mysqli_connect("localhost","wrong_user","my_password","my_db")) === false)
          die("Could not connect to database");

      // select database
      if (mysqli_select_db($connection,"tzfx") === false)
          die("Could not select database");

      // prepare SQL
      $sql = sprintf("SELECT 1 FROM users WHERE user='%s' AND pass=AES_ENCRYPT('%s', '%s')",
                     mysqli_real_escape_string($connection,$_POST["user"]),
                     mysqli_real_escape_string($connection,$_POST["pass"]),
                     mysqli_real_escape_string($connection,$_POST["pass"]));

      // execute query
      $result = mysqli_query($connection,$sql);
      if ($result === false)
          die("Could not query database");

      // check whether we found a row
      if (mysqli_num_rows($result) == 1) {
          // remember that user's logged in
          $_SESSION["authenticated"] = true;
          $_SESSION["user"] = $_POST["user"];

          // redirect user to home page, using absolute path, per
          // http://us2.php.net/manual/en/function.header.php
          $host = $_SERVER["HTTP_HOST"];
          $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
         // header("Location: http://$host$path/index.php");
             header("Location: http://$host/exam/index.php");
         
          exit;
      } else {
        $prompt =  "用户名或密码错误！！";
      }
  }  

  require '../../resources/view/header.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>登录界面</title>
</head>

<body>
    <div class="box">
        <div class="left"></div>
        <div class="right">
            <h4>登 录</h4>
            <form action="<?php  print($_SERVER["PHP_SELF"]) ?>" method="post">
                <input class="acc" name="user" type="text" placeholder="用户名">
                <input class="acc" name="pass" type="password" placeholder="密码">
                <input class="submit" type="submit" value="登录">
            <?php print($prompt) ?>
            </form>
            <div class="fn">
                <a href="register.php">注册账号</a>
                <a href="register.php">注册账号</a>
                
            </div>
        </div>
    </div>

<!--登录界面作者的空间 https://space.bilibili.com/108279272 -->
</body>


  <?php
  require '../../resources/view/footer.php';
?>