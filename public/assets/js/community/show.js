$(document).ready(function(){
    $(".delete").on("click", function(){
        $("#to-delete").val(this.id);
    })

    $("#deleteYes").on("click", function(){
        $("#delete-post-" + $("#to-delete").val()).submit();
    })
})