window.onscroll = function () { menuScroll()}

let elementosNav = document.querySelectorAll(".navItem");
let menuHeader = document.getElementById("menuHeader");

function menuScroll() {
  if (document.documentElement.scrollTop > 50) {
    menuHeader.setAttribute("style","background-color:rgb(80,80,80)");
  } else {
    menuHeader.removeAttribute("style");
  }
}

$(document).ready(function(){

    if ($('body').height() < $(window).height()) {
        $('#rodape').addClass('fixed-bottom');
    }

});

