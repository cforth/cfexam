<?php
    // enable sessions
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    $prompt = " ";

    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass1"]) && isset($_POST["pass2"]))
    {

        // connect to database
        if (($connection = mysqli_connect("localhost","wrong_user","my_password","my_db")) === false)
            die("Could not connect to database");

        // select database
        if (mysqli_select_db($connection,"tzfx") === false)
            die("Could not select database");

        $name = sprintf("SELECT 1 FROM `users` WHERE `user` = '%s'", mysqli_real_escape_string($connection,$_POST["user"]));

        $result = mysqli_query($connection,$name);
        if (mysqli_num_rows($result) == 0) {
          // prepare SQL
          $sql = sprintf("INSERT INTO `users` (`user`, `pass`) VALUES ('%s' , AES_ENCRYPT('%s', '%s'))",
                       mysqli_real_escape_string($connection,$_POST["user"]),
                       mysqli_real_escape_string($connection,$_POST["pass1"]),
                       mysqli_real_escape_string($connection,$_POST["pass1"]));

          // execute query
          $result = mysqli_query($connection,$sql);
          if ($result === false)    {
            die("Could not query database");
          } else {
            // remember that user's logged in
            $_SESSION["authenticated"] = true;
            $_SESSION["user"] = $_POST["user"];

            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/login.php");
            exit;
          }
        } else {
          $prompt = "用户名已存在，请重新输入";
        }
    
    }

  require '../../resources/view/header.php';
?>

  <script>

    function validate()  {
      if (document.forms.registration.user.value == "") {
        alert("用户名不能为空");
        return false;
      }
      else if (document.forms.registration.pass1.value == "") {
        alert("密码不能为空");
        return false;
      }
      else if (document.forms.registration.pass1.value != document.forms.registration.pass2.value) {
        alert("两次必须输入同样的密码");
        return false;
      }

      return true;
    }

  </script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>注册界面</title>
</head>

<body>
    <div class="box">
        <div class="left"></div>
        <div class="right">
            <h4>注册</h4>
            <form action="<?php  print($_SERVER["PHP_SELF"]) ?>" method="post" name="registration" onsubmit="return validate();">
                <input class="acc" name="user" type="text" placeholder="用户名">
                <input class="acc" name="pass1" type="password" placeholder="确认密码">
                <input class="acc" name="pass2" type="password" placeholder="确认密码">
                <input class="submit" type="submit" value="注册">
            </form>

        </div>
    </div>
</body>


    <p><?php print($prompt) ?></p>
    

<?php
  require '../../resources/view/footer.php';
?>