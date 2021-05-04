<?php

$ids = $_POST["ids"];

if(isset($_COOKIE["Cart"])){
  $_COOKIE["recent-bought"] = $_COOKIE["Cart"];

  setcookie("recent-bought", $_COOKIE["recent-bought"], time()+ 24*60*60, "/");

  unset($_COOKIE['Cart']);
  setcookie('Cart', null, -1, '/');

  unset($_COOKIE['total_price']);
  setcookie('total_price', null, -1, '/');
}

header("Location:/Hot_Burgers/index.php");
