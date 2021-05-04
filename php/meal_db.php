<?php

  class Meal_db {
    private mysqli $link;

    public function __construct(){
      $this->link = mysqli_connect("localhost", "root", "", "meals");

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
      // if (mysqli_query($this->link, $ceate_reviews_table)){
      //   echo "<h3>TABLE_reviews succes</h3><br><br><br><br>";
      // }
      // else {
      //   echo "<h3>TABLE_reviews failed:</h3>".mysqli_error($this->link)."<br><br><br><br>";
      // }
    }

    public function getAllMeals(): ?array {
        $sql = "SELECT * FROM meal;";
        $meal_table = mysqli_query($this->link, $sql);

        if (mysqli_num_rows($meal_table) > 0) {
            $array_of_meal_records = array();
            while ($meal_row = mysqli_fetch_assoc($meal_table)) {
                $reviews_table = mysqli_query($this->link, "SELECT AVG(rating) AS rating, meal_id FROM reviews GROUP BY meal_id;");
                if(mysqli_num_rows($reviews_table) > 0){
                    $flag = 0;
                    while ($reviews_row = mysqli_fetch_assoc($reviews_table)) {
                        if($meal_row["id"]==$reviews_row["meal_id"]){
                            $meal_row["rating"] = round($reviews_row["rating"], 1);
                            $flag = 1;
                        }
                    }
                    if($flag == 0){
                        $meal_row["rating"] = 0.0;
                    }
                }
                else{
                    $meal_row["rating"] = 0.0;
                }
                array_push($array_of_meal_records, $meal_row);
            }
            return $array_of_meal_records;
        }
        return null;
    }

    public function getMealById($id): ?array {
        $target_meal = array();
        $meals = $this->getAllMeals();
        foreach ($meals as $meal) {
            if($meal["id"] == $id){
                $target_meal = $meal;
                break;
            }
        }
        require_once 'php/meal.php';
        $mealsObject = new Meal();
        $meal_with_nutrition = $mealsObject->getMealById($id);
        $target_meal["nutrition"] = $meal_with_nutrition["nutrition"];

        return $target_meal;
    }

    public function getMealReviews($id): ?array {
      $sql = "SELECT * FROM reviews WHERE meal_id = $id;";
      $reviews_table = mysqli_query($this->link, $sql);
      $array_of_reviews_records = array();
      while ($reviews_row = mysqli_fetch_assoc($reviews_table)) {
          array_push($array_of_reviews_records, $reviews_row);
      }
      return $array_of_reviews_records;
    }

    public function addMealReview(): bool {

        $reviewr_image = "default.jpg";

        if(isset($_FILES["image_info_array"])){
            if($this->upload_image($_FILES["image_info_array"])){
                $reviewr_image = $_FILES["image_info_array"]["name"];
            }
        }

        $reviewer_name = mysqli_real_escape_string($this->link, $_POST["reviewer_name"]);
        $city = mysqli_real_escape_string($this->link, $_POST["city"]);
        $review_date = date("Y-m-d H:i:s");
        $rating = mysqli_real_escape_string($this->link, $_POST["rating"]);
        $image = mysqli_real_escape_string($this->link, $reviewr_image);
        $review = mysqli_real_escape_string($this->link, $_POST["review"]);
        $meal_id = mysqli_real_escape_string($this->link, $_POST["meal_id"]);
        $sql = "
            INSERT INTO reviews (reviewer_name, city, date, rating, image, review, meal_id) VALUES
            ('$reviewer_name', '$city', '$review_date', '$rating', '$image', '$review', '$meal_id')
        ";

        return mysqli_query($this->link, $sql);
    }

    private function upload_image($image_array): bool {
        $pos = strrpos(__DIR__, "p");
        $directory = substr(__DIR__,0,$pos-2);
        $image_path = $directory."reviewImages/".basename($image_array["name"]);
        return move_uploaded_file($image_array["tmp_name"], $image_path);
    }
  }


  // if ($link === false) {
  //   // this block will be executed once I turn off MySQL on XAMPP
  //   die("Error Connecting: ".mysqli_connect_error());
  // }

  // if (mysqli_query($link, "CREATE DATABASE meals")){
  //   echo "<h3>DATABASE_meals succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>DATABASE_meals failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }

  // $ceate_meal_table = "create table meal(
  //   id int not null primary key auto_increment,
  //   title varchar(50) not null,
  //   price decimal(10, 2) unsigned not null default 0,
  //   image varchar(500),
  //   description varchar(700) not null
  // )";

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

  // if (mysqli_query($link, $ceate_meal_table)){
  //   echo "<h3>TABLE_meal succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>TABLE_meal failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }
  //
  // if (mysqli_query($this->link, $ceate_reviews_table)){
  //   echo "<h3>TABLE_reviews succes</h3><br><br><br><br>";
  // }
  // else {
  //   echo "<h3>TABLE_reviews failed:</h3>".mysqli_error($link)."<br><br><br><br>";
  // }


  // mysqli_close($link);
