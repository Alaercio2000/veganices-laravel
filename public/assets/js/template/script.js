window.onscroll = function () { menuScroll()}

let elementosNav = document.querySelectorAll(".navItem");
let menuHeader = document.getElementById("menuHeader");

function menuScroll() {
  if (document.documentElement.scrollTop > 50) {
    menuHeader.setAttribute("style","background-color:#FFDD8C");
    elementosNav.forEach(function(elem) {
        elem.classList.add('text-dark');
      });
  } else {
    menuHeader.removeAttribute("style");
    elementosNav.forEach(function(elem) {
        elem.classList.remove('text-dark');
      });
  }
}

$(document).ready(function(){

    if ($('body').height() < $(window).height()) {
        $('#rodape').addClass('fixed-bottom');
    }

});

