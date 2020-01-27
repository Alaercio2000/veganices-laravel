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