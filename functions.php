<?php
include('config.php');

function conection(){
  include('config.php');
  $conection = new mysqli($host, $user, $password, $dbname);
  mysqli_set_charset($conection, "utf8");
  if (!$conection) {
    die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
  }else{
    return $conection;
  }
}

?>