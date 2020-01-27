window.onscroll = function () { menuScroll()}

var elementosNav = document.querySelectorAll("#textMenu");

function menuScroll() {
  if (document.documentElement.scrollTop > 50) {
    document.getElementById("menuHeader").setAttribute("style","background-color:#FFDD8C");
    document.getElementById("iconeMenu").classList.add("text-dark");
    document.getElementById("textMenu1").classList.add("text-dark");
    document.getElementById("textMenu2").classList.add("text-dark");
    document.getElementById("textMenu3").classList.add("text-dark");
    document.getElementById("textMenu4").classList.add("text-dark");
    document.getElementById("textMenu5").classList.add("text-dark");
  } else {
    document.getElementById("menuHeader").removeAttribute("style");
    document.getElementById("iconeMenu").classList.remove("text-dark");
    document.getElementById("textMenu1").classList.remove("text-dark");
    document.getElementById("textMenu2").classList.remove("text-dark");
    document.getElementById("textMenu3").classList.remove("text-dark");
    document.getElementById("textMenu4").classList.remove("text-dark");
    document.getElementById("textMenu5").classList.remove("text-dark");
  }
}
