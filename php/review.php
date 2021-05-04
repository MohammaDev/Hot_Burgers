<?php

  require_once "meal_db.php";
  $db = new Meal_db();

  if($_SERVER["REQUEST_METHOD"] == "GET"){
      echo json_encode($db->getMealReviews($_GET["id"]));
  }
  else {
      echo json_encode($db->addMealReview());
  }














  // $link = mysqli_connect("localhost", "root", "", "test");
  // if ($link === false) {
  //   // this block will be executed once I turn off MySQL on XAMPP
  //   die("Error Connecting: ".mysqli_connect_error());
  // }
  //
  // if (mysqli_query($link, "CREATE DATABASE meals")){
  //   echo "<h3>DATABASE_meals succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>DATABASE_meals failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }
  //
  // $ceate_meal_table = "create table meal(
  //   id int not null primary key auto_increment,
  //   title varchar(50) not null,
  //   price decimal(10, 4) unsigned not null default 0,
  //   image varchar(500),
  //   description varchar(700) not null
  // )";
  //
  // $ceate_reviews_table = "create table reviews(
  //   id int not null primary key auto_increment,
  //   reviewer_name varchar(80) not null,
  //   city varchar(80) not null,
  //   date datetime,
  //   rating tinyint(3) unsigned not null,
  //   image varchar(500),
  //   review varchar(500) not null,
  //   meal_id int(11) not null,
  //   foreign key (meal_id) references meal(id)
  // )";
  //
  // if (mysqli_query($link, $ceate_meal_table)){
  //   echo "<h3>TABLE_meal succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>TABLE_meal failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }
  //
  // if (mysqli_query($link, $ceate_reviews_table)){
  //   echo "<h3>TABLE_reviews succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>TABLE_reviews failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }
  //
  //
  // mysqli_close($link);
