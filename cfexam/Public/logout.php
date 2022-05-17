<?php 
  // enable sessions
  session_start();
  error_reporting(E_ALL ^ E_DEPRECATED);
  

  // delete cookies, if any
  setcookie("user", "", time() - 3600);
  setcookie("pass", "", time() - 3600);

  // log user out
  setcookie(session_name(), "", time() - 3600);
  session_destroy();
  // redirect user to home page, using absolute path, per
  // http://us2.php.net/manual/en/function.header.php
  $host = $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
  header("Location: http://$host$path/index.php");
  exit;
?>

