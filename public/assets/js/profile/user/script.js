function hoverImageProfile() {
    $('#iconCamera').css('opacity', '1');
    $('#textImageHover').css('opacity', '1');
    $('#imageProfile').css('filter', 'grayscale(80%)');
}

function outImageProfie() {
    $('#iconCamera').css('opacity', '0');
    $('#textImageHover').css('opacity', '0');
    $('#imageProfile').css('filter', 'grayscale(0)');
}


$('#imageProfile , #iconCamera , #optionsClickImage').hover(function () {
    hoverImageProfile()
}, function () {
    outImageProfie()
});

function clickImage() {
    $('#optionsClickImage').css('display', 'block');
    $('.options').css('display', 'block');
}

function clickOutImage() {
    $('#optionsClickImage').css('display', 'none');
}

$('#imageProfile , #iconCamera').click(function (event) {
    clickImage()
});

$('body').click(function (event) {
    if (event.target.id != 'imageProfile' &&
        event.target.id != 'iconCamera' &&
        event.target.id != 'optionsClickImage') {
        clickOutImage()
    };
});


function previewImage(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#divCardUpload').addClass('d-block');
            $('#imageUpload').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#uploadImage").change(function () {
    previewImage(this);
});

$('#viewImage').click(function () {
    $('#viewImage').fadeOut(function () {
        $('#divViewImageProfile').css('display', 'block');
        $('#viewImageProfile').css('display', 'inline-block');
    });
    $('#divViewImageProfile , #viewImageProfile').fadeIn();
    viewImageTrue();
});


function viewImageTrue() {
    if (document.getElementById('divViewImageProfile').style.display == 'block') {

        $('#divViewImageProfile').click(function (event) {
            if (event.target.id != 'viewImageProfile') {
                $('#divViewImageProfile , #viewImageProfile').css('display', 'none');
            }
        });
    }
}

$('#closeUpload').click(function(){
    location.reload();
});
