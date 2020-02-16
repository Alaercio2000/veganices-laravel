function filter(categoryId) {
    var req = new Request('/api/filter/' + categoryId);
    fetch(req).then(function(response) {
        response.json().then(function(response) {
            data.forEach(function(article){
                document.querySelector('main').innerHTML += `
                    <div class="row border-top ml-3">
                        <div class="col-12 col-md-5">
                            <div class="card-body d-flex flex-column">
                            <img class="restaurante" src="public/app/imageRecipes/${data.image}" />
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="row">
                            <div class="col-9 card-body d-flex flex-column pl-0">
                                <h5 class="card-title mt-2">${data.name}</h5>
                                {{-- <h6 class="card-subtitle mb-2 text-muted">Um breve descrição do produto</h6> --}}
                            </div>
                            <div class="col-3 card-body d-flex flex-column">
                                <a href="#" class="card-link align-self-center d-flex flex-column">
                                <i class="material-icons align-self-center">favorite</i>
                                </a>
                            </div>
                            <p class="card-text align-self-center m-0">${data.preparation_method}</p>
                            <div class="col-12 d-flex justify-content-end my-3">
                            <a class="text-light btn btn-primary" href="/recipes/${data.id}">Ver receita</a>
                            </div>
                            </div>
                        </div>
                    </div>
                `
            })
        })
    })
    
}


$('.category-recipe').on('click', function(){
    filter($(this).val());
});


