<?php


  //Get the id value of the clicked added meal
  $id = $_GET["id"];


  // Check if the array of Cookie_Cart is not empty
  if(isset($_COOKIE["Cart"])){
    // If not empty, then add the new value
    $_COOKIE["Cart"] .= ", ".$id;
  }
  else {
    // If empty, then new Cookie_Cart with first id value
    $_COOKIE["Cart"] = $id;
  }

  setcookie("Cart", $_COOKIE["Cart"], time()+ 24*60*60, "/");
  header("Location:/Hot_Burgers/".$_GET["back"]."?id=".$id);

  // unset($_COOKIE['Cart']);
  // setcookie('Cart', null, -1, '/');
  //
  // unset($_COOKIE['total_price']);
  // setcookie('total_price', null, -1, '/');
  //
  // unset($_COOKIE['recent-bought']);
  // setcookie('recent-bought', null, -1, '/');
