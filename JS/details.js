function sendForm(form){
  let requestToPost = new XMLHttpRequest();
  requestToPost.open("POST", "php/review.php", true);
  let data = new FormData(form);

  requestToPost.send(data);
  requestToPost.onreadystatechange = ()=>{
    alert(requestToPost.readyState);
    alert(requestToPost.status);
    if (requestToPost.readyState == 4 && requestToPost.status == "200") {
      if(requestToPost.response){
        alert("Your review has been added successfully");
      }
      else{
        alert("false");
      }
      showReviews(form.firstElementChild.value);
    }
  }
  return false;
}


function showReviews(id) {
    // alert("hi0")
    let requestToGet = new XMLHttpRequest();
    // alert("hi0.1")
    requestToGet.open("GET", "php/review.php?id="+id, true);
    // alert("hi0.2")
    requestToGet.onload = function() {
        // alert("hi1")
        var response = JSON.parse(requestToGet.responseText);
        if (requestToGet.readyState == 4 && requestToGet.status == "200") {
              // alert("hi2")
            console.table(response);
            if (response.length > 0) {
              // alert("hi3")
              // document.getElementById("taps-area").innerHTML =
              //   '<ul class="nav nav-pills nav-fill mt-5 mb-4" id="pills-tab" role="tablist">'
              // +   '<li class="nav-item" role="presentation">'
              // +       '<button class="nav-link desciption-title" id="pills-discription-tab" data-bs-toggle="pill" data-bs-target="#pills-discription" type="button" role="tab" aria-controls="pills-discription" aria-selected="false">Discription</button>'
              // +   '</li>'
              // +   '<li class="nav-item" role="presentation">'
              // +       '<button class="nav-link desciption-title active" id="pills-reviews-tab" onclick="showReviews('+id+')" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="true">Reviews</button>'
              // +   '</li>'
              // + '</ul>'

              document.getElementById("indicators-area").innerHTML = ""
              document.getElementById("inner-area").innerHTML = ""

              document.getElementById("indicators-area").innerHTML = '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-warning" aria-current="true" aria-label="Slide 1"></button>'

              var stars="";
              for (var j = response[0]["rating"] ; j > 0; j--) {
                  stars += "⭐"
              }

              document.getElementById("inner-area").innerHTML +=
                  '<div class="carousel-item active">'
                +   '<div class="row">'
                +     '<div class="col-lg-6">'
                +         '<img src="reviewImages/'+ response[0]["image"] +'" class="meal-img" alt="man-eating-burger">'
                +     '</div>'
                +     '<div class="col-lg-6 div-middle">'
                +         '<div id="review-text">'
                +             '<h4>'+ response[0]["reviewer_name"] +'</h4>'
                +             '<h5>'
                +                 response[0]["city"]+' - '+response[0]["date"]+' - '+stars
                +             '</h5>'
                +             '<p>'+ response[0]["review"] +'</p>'
                +         '</div>'
                +     '</div>'
                +   '</div>';
                + '</div>'


              for (var i = 1; i < response.length; i++) {

                document.getElementById("indicators-area").innerHTML +=
                  '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'+i+'" class="bg-warning" aria-label="Slide'+(i+1)+'"></button>'

                var stars="";
                for (var j = response[i]["rating"] ; j > 0; j--) {
                    stars += "⭐"
                }

                document.getElementById("inner-area").innerHTML +=
                    '<div class="carousel-item">'
                  +   '<div class="row">'
                  +     '<div class="col-lg-6">'
                  +         '<img src="reviewImages/'+ response[i]["image"] +'" class="meal-img" alt="man-eating-burger">'
                  +     '</div>'
                  +     '<div class="col-lg-6 div-middle">'
                  +         '<div id="review-text">'
                  +             '<h4>'+ response[i]["reviewer_name"] +'</h4>'
                  +             '<h5>'
                  +                 response[i]["city"]+' - '+response[i]["date"]+' - '+stars
                  +             '</h5>'
                  +             '<p>'+ response[i]["review"] +'</p>'
                  +         '</div>'
                  +     '</div>'
                  +   '</div>';
                  + '</div>'
              }
              // alert("hi4")

            }
            else {
              document.getElementById("reviews-area").innerHTML = "<div class='special-case'><h3>No Reviews</h3></div>";
            }
        }
        else {
            console.error(response);
        }
    }
    requestToGet.send();
}

function nav_to(area) {
  document.getElementById(area+'-anchor').click();
}

function hide_nav_onscroll() {
  let nav = document.getElementById('navbarTogglerDemo02');

  if(nav.offsetParent != null) {
    nav.classList.toggle('show');
  }
}


var cartCounter = 0;
var mealCounter = 1;
var addToCartButton = document.getElementById("add-to-cart-button");

var counter = 0;

var counter1 = 0;
var counter2 = 0;
var counter3 = 0;
var counter4 = 0;
var counter5 = 0;
var counter6 = 0;

var counter1prev = -1;
var counter2prev = -1;
var counter3prev = -1;
var counter4prev = -1;
var counter5prev = -1;
var counter6prev = -1;

var total = 0.0;

function incrementNavCart1() {
  counter += 1;
  counter1 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function incrementNavCart2() {
  counter += 1;
  counter2 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function incrementNavCart3() {
  counter += 1;
  counter3 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function incrementNavCart4() {
  counter += 1;
  counter4 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function incrementNavCart5() {
  counter += 1;
  counter5 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function incrementNavCart6() {
  counter += 1;
  counter6 += 1;
  document.getElementById("counter").innerHTML = counter;
}

function CartButtonClicked() {

  if ((counter1 != 0) && (counter1 != counter1prev)) {
    var name = "Best Sandwich";
    var price = 23.9;
    total += price*counter1;

    var i;
    for (i = 0; i < counter1; i++) {
      document.getElementById("meal1-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter1 = counter1prev;
  }

  if ((counter2 != 0) && (counter2 != counter2prev)) {
    var name = "Burger";
    var price = 25.9;
    total += price*counter2;

    var i;
    for (i = 0; i < counter2; i++) {
      document.getElementById("meal2-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter2 = counter2prev;
  }

  if ((counter3 != 0) && (counter3 != counter3prev)) {
    var name = "Burger Meal";
    var price = 27.5;
    total += price*counter3;

    var i;
    for (i = 0; i < counter3; i++) {
      document.getElementById("meal3-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter3 = counter3prev;
  }

  if ((counter4 != 0) && (counter4 != counter4prev)) {
    var name = "Best Deal Meal";
    var price = 32.9;
    total += price*counter4;

    var i;
    for (i = 0; i < counter4; i++) {
      document.getElementById("meal4-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter4 = counter4prev;
  }

  if ((counter5 != 0) && (counter5 != counter5prev)) {
    var name = "Checken Burger";
    var price = 19.4;
    total += price*counter5;

    var i;
    for (i = 0; i < counter5; i++) {
      document.getElementById("meal5-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter5 = counter5prev;
  }

  if ((counter6 != 0) && (counter6 != counter6prev)) {
    var name = "Pizza";
    var price = 28.5;
    total += price*counter6;

    var i;
    for (i = 0; i < counter6; i++) {
      document.getElementById("meal6-field").innerHTML +=
          '<div class="row">'
        +  '<div class="col-6">'
        +     name
        +   '</div>'
        +   '<div class="col-6">'
        +     price
        +  '</div>'
        + '</div>';
    }
    counter6 = counter6prev;
  }

  // createCookie("total_price", total, "10");
  document.getElementById("total-price").innerHTML = total;
}

function PlusButtonClicked() {
  document.getElementById("meal-counter").innerHTML = ++mealCounter;
}

function MinusButtonClicked() {
  if (mealCounter > 1) {
    document.getElementById("meal-counter").innerHTML = --mealCounter;
  }
}

function TextAreaTriggered() {
  document.getElementById("comment-counter").innerHTML = document.getElementById("myTextArea").value.length;
  document.getElementById("warning-label").style.display = "none";
}

function SubmitButtonClicked() {
  if( document.getElementById("myTextArea").value.length == 0) {
    document.getElementById("warning-label").style.display = "block";
  }
  if(document.getElementById("nameFinal").value.length == 0){
    document.getElementById("nameFinal").value = "Customer";
  }else{
    location.reload();
  }
}

function disappearReviewList() {
  document.getElementById('Reviewlist').style.display = "none";
}

function appear(){
  document.getElementById('Reviewlist').style.display = "block";
  setTimeout(showAnimation, 0);
}

function showAnimation() {
  document.getElementById('Reviewlist').style.height = "100%";
  document.getElementById('Reviewlist').style.paddingLeft = "0px";
}
