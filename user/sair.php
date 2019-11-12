<?php
@session_start();
@session_destroy();
@session_unset();
unset($_COOKIE['Test']);
header("Location: ../login.php");
?>