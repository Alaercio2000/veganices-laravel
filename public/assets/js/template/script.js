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

// Modal

function showModalLogin(){
    hideModalCadastro();
    if (document.getElementById("modal-login").classList.contains("d-none")){
        document.getElementById("modal-login").classList.remove("d-none");
    }else{
        document.getElementById("modal-login").classList.add("d-none");
    }
}

function showModalCadastro(){
    hideModalLogin();
    if (document.getElementById("modal-cadastro").classList.contains("d-none")){
        document.getElementById("modal-cadastro").classList.remove("d-none");
    }else{
        document.getElementById("modal-cadastro").classList.add("d-none");
    }
}

function hideModalLogin(){
    document.getElementById("modal-login").classList.add("d-none");
}

function hideModalCadastro(){
    document.getElementById("modal-cadastro").classList.add("d-none");
}
