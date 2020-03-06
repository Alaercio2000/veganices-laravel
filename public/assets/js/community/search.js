$(document).ready(function(){
    $("#btn-slug").on("click", function(){
        $('#form-slug').attr('action', '/community/list/' + $('#slug').val())
        $('#form-slug').submit()
    });
});