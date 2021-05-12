<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Hot Burgers</title>
  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- OUR CSS -->
  <link rel="stylesheet" href="css/index.css">

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- OUR JS -->
  <script src="JS/index.js"></script>
</head>

<body onscroll="hide_nav_onscroll()">

  <!-- NAV & Madal -->
  <?php
    include 'inc/inc.header.php';
    require_once 'php/meal_db.php';
    $dbObject = new Meal_db();
    $arrayOfMeals_DB = $dbObject->getAllMeals();
  ?>

  <main>

    <!-- HOME HEADER -->
    <header class="home-header" id="home">
        <h1 class="party-time">Party Time</h1>
        <div class="box"><h3 class="by-2-burger">Buy any 2 burgers and get 1.5L Pepsi Free</h3></div>
        <a class="btn btn-sm rounded-pill btn-warning order-btn">Order Now</a>
    </header>



    <!-- MENU SECTION -->
    <section id=menu>
      <!-- MENU SUBSECTION 1-->
      <section class="my-container">

        <?php if(isset($_COOKIE["recent-bought"])): ?>

          <?php
              $bought_meals_ids = $_COOKIE["recent-bought"];
              $bought_meals_ids = str_replace(", ", "", $bought_meals_ids);
              $bought_meals_ids = str_split($bought_meals_ids);
              $bought_meals_ids = array_unique($bought_meals_ids);
          ?>
          <h2 class="want-to-eat menu-subsection-1">Recent Bought Products</h2>

          <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

            <?php foreach ($bought_meals_ids as $id): ?>
              <div class="col">
                <a href=<?php echo "details.php?id=".$arrayOfMeals_DB[$id-1]["id"]; ?> class="card-decoration">
                  <div class="card h-100">
                    <img src=<?php echo "Images/".$arrayOfMeals_DB[$id-1]["image"];?> class="card-img-top" alt="meal_image">
                    <div class="card-body">
                      <p class="card-info">⭐<?php echo $arrayOfMeals_DB[$id-1]["rating"];?> rating</p>
                      <h5 class="card-title" id=<?php echo "meal".($id)."-name"; ?>> <?php echo $arrayOfMeals_DB[$id-1]["title"];?> </h5>
                      <p class="card-info">Some discription</p>
                      <a href=<?php echo "php/cart.php?id=".$arrayOfMeals_DB[$id-1]["id"]."&back=index.php#menu"; ?> class="btn btn-sm btn-warning rounded-pill text-white ">Buy Again</a>
                      <p class="card-last-info" id=<?php echo "meal".($id)."-price" ?>><?php echo $arrayOfMeals_DB[$id-1]["price"];?> SAR</p>
                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>
        <section class="menu-subsection-1 my-container">

          <h2 class="want-to-eat">Want To Eat</h2>
          <p class="try-our-delicious">Try our most delicious food and usually take minutes to deliver</p>

          <div class="row g-0">
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">pizza</a>
            </div>
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">fast food</a>
            </div>
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">cub cake</a>
            </div>
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">sandwich</a>
            </div>
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">spaghetti</a>
            </div>
            <div class="col-md-2 col-4">
              <a href="" class="menu-links">burger</a>
            </div>
          </div>
        </section>


      <!-- MENU SUBSECTION 2-->
      <section class="menu-subsection-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-6 d-flex justify-content-center">
              <img src="Images/delivery.png" class="delivery-guy-img" alt="delivery_guy_picture">
            </div>
            <div class="col-xl-6 div-middle d-flex justify-content-center">
              <div class="right-guy-div">
                <div class="triangle"><h2 class="we-guarantee">We guarantee 30 minutes delivery</h2></div>
                <p class="if-you-are-having">If you are having a meeting, working late at night and need extra push</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>

    <!-- GALLERY SECTION -->
    <section id=gallery class="my-container">
      <h2 class="our-most">Our Most Popular Recipes</h2>
      <p class="try-our-most">Try our most delicious food and usually take minutes to deliver</p>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        <?php if(isset($arrayOfMeals_DB)):?>
            <?php for ($i=0 ; $i<count($arrayOfMeals_DB) ; $i++): ?>
                <div class="col">
                    <a href=<?php echo "details.php?id=".$arrayOfMeals_DB[$i]["id"]; ?> class="card-decoration">
                        <div class="card h-100">
                            <img src=<?php echo "Images/".$arrayOfMeals_DB[$i]["image"];?> class="card-img-top" alt="meal_image">
                            <div class="card-body">
                                <p class="card-info">⭐<?php echo $arrayOfMeals_DB[$i]["rating"];?> rating</p>
                                <h5 class="card-title" id=<?php echo "meal".($i+1)."-name"; ?>> <?php echo $arrayOfMeals_DB[$i]["title"];?> </h5>
                                <p class="card-info">Some discription</p>
                                <a href=<?php echo "php/cart.php?id=".$arrayOfMeals_DB[$i]["id"]."&back=index.php#gallery"; ?> class="btn btn-sm btn-warning rounded-pill text-white ">add to cart</a>
                                <p class="card-last-info" id=<?php echo "meal".($i+1)."-price" ?>><?php echo $arrayOfMeals_DB[$i]["price"];?> SAR</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endfor; ?>
      <?php endif; ?>
      </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section id=testimonials>
        <h2 class="clients">Clients Testimonials</h2>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-warning" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-warning" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-warning" aria-label="Slide 3"></button>
          </div>

          <div class="carousel-inner">
            <div class="ci carousel-item active">
              <div class="row">
                <div class="col-lg-6">
                  <img src="Images/man-eating-burger.png" class="meal-img" alt="man-eating-burger">
                </div>
                <div class="col-lg-6 div-middle testimonial-desciption">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam?
                  </p>
                </div>
              </div>
            </div>

            <div class="ci carousel-item">
              <div class="row">
                <div class="col-lg-6">
                  <img src="Images/man-eating-burger.png" class="meal-img" alt="man-eating-burger">
                </div>
                <div class="col-lg-6 div-middle testimonial-desciption">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam?
                  </p>
                </div>
              </div>
            </div>

            <div class="ci carousel-item">
              <div class="row">
                <div class="col-lg-6">
                  <img src="Images/man-eating-burger.png" class="meal-img" alt="man-eating-burger">
                </div>
                <div class="col-lg-6 div-middle testimonial-desciption">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam?
                  </p>
                </div>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon ccpi" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon ccni" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <?php
      include 'inc/inc.footer.php';
    ?>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
