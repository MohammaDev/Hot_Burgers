
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <!-- OUR CSS -->
  <link rel="stylesheet" href="css/details.css">

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- OUR JS -->
  <script src="JS/details.js"></script>
  <title>Burger Details</title>
</head>

<body>

  <!-- NAV & Madal -->
  <?php
    include 'inc/inc.header.php';
  ?>

  <?php if(isset($_GET["id"])): ?>
    <?php
      require_once 'php/meal_db.php';
      $id = $_GET["id"];
      $mealsObject_db = new Meal_db();
      $meal_db = $mealsObject_db->getMealById($id);
    ?>

  <main class="main-container">
    <!-- DETAILS_SECTION -->
    <section>
      <div class="row my-container" style="margin-top: 20px;">
        <div class="col-lg-6">
          <img src=<?php echo "Images/".$meal_db["image"] ;?> class="meal-img" alt="meal_picture">
        </div>
        <div class="col-lg-6 meal-details">
          <h1><?php echo $meal_db["title"] ;?></h1>
          <p><?php echo $meal_db["price"] ;?> SAR</p>
          <p>⭐<?php echo $meal_db["rating"] ;?> rating</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam!</p>
          <div class="div-buttons">
            <button onclick="MinusButtonClicked()" type="button" class="btn btn-sm btn-outline-warning">–</button>
            <button id="meal-counter" type="button" class="btn btn-sm btn-outline-warning">1</button>
            <button onclick="PlusButtonClicked()" type="button" class="btn btn-sm btn-outline-warning">+</button>
            <a href=<?php echo "php/cart.php?id=".$meal_db["id"]."&back=details.php"; ?> id="add-to-cart-button" class="btn btn-sm rounded-pill order-btn">add to cart</a>
          </div>
        </div>
      </div>

      <div class="my-container">
        <div id="taps-area">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link desciption-title active" id="pills-discription-tab" data-bs-toggle="pill" data-bs-target="#pills-discription" type="button" role="tab" aria-controls="pills-discription" aria-selected="true">Discription</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link desciption-title" id="pills-reviews-tab" onclick="showReviews(<?= $_GET["id"] ?>)" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
              </li>
            </ul>
        </div>
      </div>

      <div class="tab-content" id="pills-tabContent">

        <!-- DESCRIPTION_SECTION -->
        <div class="tab-pane fade show active my-container" id="pills-discription" role="tabpanel" aria-labelledby="pills-discription-tab">
          <p class="desciption-body">
            <?php echo $meal_db["description"]; ?>
          </p>

          <h4 class="table-title">nurtion facts</h4>

          <table class="table-style">
            <tr>
              <td colspan="3"><b>Supplement Facts</b></td>
            </tr>
            <tr>
              <td colspan="3"><b>Serving Size:</b> <?php echo $meal_db["nutrition"]["serving_size"]; ?></td>
            </tr>
            <tr>
              <td colspan="3"><b>Serving Per Container:</b> <?php echo $meal_db["nutrition"]["serving_per_container"]; ?></td>
            </tr>
            <tr>
              <td></td>
              <td><b>Amount Per Serving</b></td>
              <td><b>%Daily Value*</b></td>
            </tr>
            <?php
            $facts = $meal_db["nutrition"]["facts"];
            for ($i=0 ; $i<count($facts) ; $i++): ?>
              <tr>
                <td><?php echo $facts[$i]["item"]?></td>
                <td><?php echo $facts[$i]["amount_per_serving"]." ".$facts[$i]["unit"]; ?></td>
                <td><?php echo $facts[$i]["daily_value"]; ?></td>
              </tr>
            <?php endfor; ?>
            <tr>
              <td colspan="3">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs</td>
            </tr>
          </table>
        </div>

        <!-- REVIEW_SECTION -->
        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
          <div id="reviews-area">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
              <div id="indicators-area">

              </div>
            </div>

            <div class="carousel-inner">
              <div id="inner-area">

              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
          <a class="btn btn-sm rounded-pill add-review-btn" onclick="appear()">Add Your Review</a>
      </div>

          <div class="my-container">
            <section id="Reviewlist">

              <form enctype="multipart/form-data" method="post" onsubmit="return sendForm(this)">

                  <input type="hidden" name="meal_id" value=<?php echo $_GET["id"]; ?>>

                  <label style="margin-bottom: 5px;">Image</label> <br>
                  <input type="file" name="image_info_array" id="image_info_array"> <br><br>

                  <div>
                      <label>Rate the Food</label><br>
                      <input type="range" min="0" max="5" value="" name="rating" list="tickmarks">

                      <datalist id="tickmarks">
                          <option value="0"></option>
                          <option value="1"></option>
                          <option value="2"></option>
                          <option value="3"></option>
                          <option value="4"></option>
                          <option value="5"></option>
                      </datalist>
                  </div>

                  <label>Name</label>
                  <input required type="text" name="reviewer_name" id="nameFinal" value="" placeholder="First and Last name">

                  <label>City</label>
                  <input required type="text" name="city" id="city" value="" placeholder="City">

                  <label>Review</label>
                  <p id="warning-label">Please type your review</p>
                  <textarea required oninput="TextAreaTriggered()" type="text" id="myTextArea" name="review" placeholder="type your review here maximum 500 characters" maxlength="500"></textarea>
                  <p class="word-counter"><span id="comment-counter">0</span> / 500</p>
                  <button onclick="SubmitButtonClicked()" name="submit" class="btn btn-sm rounded-pill order-btn" style="margin-bottom: 20px;" >Submit</button>
              </form>

            </section>
          </div>
        </div>
      </div>

      </div>
    </main>
  <?php endif; ?>

  <!-- CONTACT SECTION -->
  <?php
    include 'inc/inc.footer.php';
  ?>

  <!-- OUR JS -->
  <!-- <script src="JS/details.js"></script> -->

  <!-- BOOTSTRAP JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
