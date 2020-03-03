// function createFavorite(recipe , user){

// }

// function deleteFavorite(recipe , user){


function setFavorite(recipe, user){
    if (document.getElementById('favorite-icon'+recipe).innerHTML == 'favorite') {
        var deleteFavorite = new Request('/api/favorite/destroy/' + recipe +'/'+ user);

        fetch(deleteFavorite).then(function(response) {
        document.getElementById('favorite-icon'+recipe).innerHTML = 'favorite_border';
        });
    }else{
        var createFavorite = new Request('/api/favorite/create/' + recipe +'/'+ user);

        fetch(createFavorite).then(function(response) {
            document.getElementById('favorite-icon'+recipe).innerHTML = 'favorite';
        });
    }
}
