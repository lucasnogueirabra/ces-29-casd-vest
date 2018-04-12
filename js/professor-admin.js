$("#senha-nova-2").keyup(function()
{
    if($("#senha-nova").val() == $("#senha-nova-2").val())
    {
        $("#alert-password-1").hide();
    }
    else
    {
        $("#alert-password-1").show();
    }
});

$("#senha-nova").keyup(function()
{
    if($("#senha-nova").val().length < 7)
    {
        $("#alert-password-2").show();
    }
    else
    {
        $("#alert-password-2").hide();
    }
});

$(document).ready(function () {
    buildImageCropper();
    buildFormSubmit();

    $('.cancel').on('click', function(e){
        e.preventDefault();
        window.location.href = "home";
    });

});

function buildFormSubmit(){
}

function buildImageCropper(){
    var $image = $(".image-crop > img");
    $($image).cropper({
        preview: ".img-preview",
        zoomable: false,
        aspectRatio: 1,
        done: function(data) {
            $('input[name=xCanvas]').val(data['x']);
            $('input[name=yCanvas]').val(data['y']);
            $('input[name=widthCanvas]').val(data['width']);
            $('input[name=heightCanvas]').val(data['height']);

        }
    });

    var $inputImage = $("#inputImage");
    if (window.FileReader) {
        $inputImage.change(function() {
            var fileReader = new FileReader(),
                    files = this.files,
                    file;

            if (!files.length) {
                return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
                fileReader.onload = function () {
                    $image.cropper("reset", true).cropper("replace", this.result);
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Por favor, escolha um arquivo de imagem.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    }
}