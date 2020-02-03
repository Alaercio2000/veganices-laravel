window.onscroll = function () { menuScroll()}

let elementosNav = document.querySelectorAll(".navItem");

function menuScroll() {
  if (document.documentElement.scrollTop > 50) {
    document.getElementById("menuHeader").setAttribute("style","background-color:#FFDD8C");
    elementosNav.forEach(function(elem) {
        elem.classList.add('text-dark');
      });
  } else {
    document.getElementById("menuHeader").removeAttribute("style");
    elementosNav.forEach(function(elem) {
        elem.classList.remove('text-dark');
      });
  }
}

// let modalUser = document.getElementById('modal-user');

// function showModalUser(){
//     if(modalUser.classList.contains('d-none')){
//         modalUser.classList.remove('d-none');
//     }else{
//         modalUser.classList.add('d-none');
//     }
// }
