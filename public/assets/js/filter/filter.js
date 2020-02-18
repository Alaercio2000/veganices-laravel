function filter(categoryId) {
    document.querySelector('.recipes').innerHTML = '';

    //Verificando se não tem categorias selecionadas
    if(categoryId.length === 0) {
        categoryId = 0;
    }

    var req = new Request('/api/filter/' + categoryId);

    fetch(req).then(function(response) {
        response.json().then(function(data) {
            data.forEach(function(item){
                document.querySelector('.recipes').innerHTML += `
                    <div class="row border-top ml-3">
                        <div class="col-12 col-md-5">
                            <div class="card-body d-flex flex-column">
                            <img class="restaurante" src="/app/imageRecipes/${item.image}" />
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="row">
                            <div class="col-9 card-body d-flex flex-column pl-0">
                                <h5 class="card-title mt-2">${item.name}</h5>
                            </div>
                            <div class="col-3 card-body d-flex flex-column">
                                <a href="#" class="card-link align-self-center d-flex flex-column">
                                <i class="material-icons align-self-center">favorite</i>
                                </a>
                            </div>
                            <p class="card-text align-self-center m-0">${item.preparation_method}</p>
                            <div class="col-12 d-flex justify-content-end my-3">
                            <a class="text-light btn btn-primary" href="/user/recipes/show/${item.id}">Ver receita</a>
                            </div>
                            </div>
                        </div>
                    </div>
                `
            });
        });
    });
}

function addOrRemoveCategory(categories, actualCategory) {
    if(categories.indexOf(actualCategory) == -1 && 
        categories.indexOf(',' + actualCategory) == -1) {
        if(categories.length === 0) {
            categories = actualCategory;
        } else {
            categories += ',' + actualCategory;
        }
    } else {
        categories = categories.replace(',' + actualCategory, '');
        categories = categories.replace(actualCategory + ',' , '');
        categories = categories.replace(actualCategory, '');   
    }

    return categories;
}


$('.category-recipe').on('click', function(){
    var categories = $('#categoryFilter').val();
    var actualCategory = $(this).val();
    
    categories = addOrRemoveCategory(categories, actualCategory);

    $('#categoryFilter').val(categories);
    filter(categories);
});


