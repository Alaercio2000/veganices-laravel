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

let height = document.body.offsetHeight;
let footer = document.getElementById('rodape');

if (height < 500) {
    footer.classList.add('fixed-bottom');
}else{
    footer.classList.remove('fixed-bottom');
}

