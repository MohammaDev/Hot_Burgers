<nav class="nav-container navbar fixed-top navbar-expand-xl  navbar-dark">
  <a class="navbar-brand" href="../Hot_Burgers">
    <img src="Images/logo-White.svg" alt="logo-image">
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon "></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav ms-uto">
      <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php#menu">Menu</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php#testimonials">Testimonials</a></li>
      <li class="nav-item"><a class="nav-link" href="#contact">Conatct</a></li>
      <li class="nav-item li-red"> <a class="nav-link" href="">Search</a></li>
      <li class="nav-item li-red"> <a class="nav-link" href="">Profile</a></li>
      <li class="nav-item li-red"> <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="CartButtonClicked()">Cart<span id="counter">0</span> </a></li>
    </ul>
  </div>
</nav>

<?php
  if (!empty($_COOKIE["Cart"])) {
    $cart_meals = $_COOKIE["Cart"];
    $cart_meals = str_replace(", ", "", $cart_meals);
    $cart_meals = str_split($cart_meals);
  }
?>

<!-- FOR THE INDEX PAGE -->
<?php if (!empty($_COOKIE["Cart"])): ?>
  <?php foreach ($cart_meals as $mealID): ?>
    <script>
      <?php echo "incrementNavCart".$mealID."();"; ?>;
    </script>
  <?php endforeach; ?>
<?php endif; ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-6">
            Item
          </div>
          <div class="col-6">
            Price
          </div>
        </div>

        <section id="meal1-field">

        </section>
        <section id="meal2-field">

        </section>
        <section id="meal3-field">

        </section>
        <section id="meal4-field">

        </section>
        <section id="meal5-field">

        </section>
        <section id="meal6-field">

        </section>

        <div class="row">
          <div class="col-6">
            Total
          </div>
          <div class="col-6" id="total-price">
            0.0
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-danger rounded-pill text-Black " data-bs-dismiss="modal">Close</button>
        <form action="php/order.php" method="post">
          <!-- <a href="" class="btn btn-warning rounded-pill text-Black">Order Now</a> -->
        <?php if (!empty($_COOKIE["Cart"])): ?>
          <?php if(isset($_COOKIE["total_price"])): ?>
            <input type="hidden" name="ids" value=<?php echo implode(",", $cart_meals)."#".$_COOKIE["total_price"];?>>
          <?php else: ?>
            <input type="hidden" name="ids" value=<?php echo implode(",", $cart_meals)."#NONE";?>>
          <?php endif; ?>
        <?php endif; ?>
          <button type="submit" class="btn btn-warning rounded-pill text-Black">Order Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
