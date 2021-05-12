function nav_to(area) {
  document.getElementById(area+'-anchor').click();
}

function hide_nav_onscroll() {
  let nav = document.getElementById('navbarTogglerDemo02');

  if(nav.offsetParent != null) {
    nav.classList.toggle('show');
  }
}

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
    var name = document.getElementById("meal1-name").innerHTML;
    var price = parseFloat(document.getElementById("meal1-price").innerHTML);
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
    var name = document.getElementById("meal2-name").innerHTML;
    var price = parseFloat(document.getElementById("meal2-price").innerHTML);
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
    var name = document.getElementById("meal3-name").innerHTML;
    var price = parseFloat(document.getElementById("meal3-price").innerHTML);
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
    var name = document.getElementById("meal4-name").innerHTML;
    var price = parseFloat(document.getElementById("meal4-price").innerHTML);
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
    var name = document.getElementById("meal5-name").innerHTML;
    var price = parseFloat(document.getElementById("meal5-price").innerHTML);
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
    var name = document.getElementById("meal6-name").innerHTML;
    var price = parseFloat(document.getElementById("meal6-price").innerHTML);
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

  createCookie("total_price", total, "10");
  document.getElementById("total-price").innerHTML = total;
}

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(total) + expires + "; path=/";
}
