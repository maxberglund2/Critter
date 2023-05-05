<?php
session_start();

function logoutFunc() {
  session_destroy();
  header("Location: login.php");
}

logoutFunc();
?>