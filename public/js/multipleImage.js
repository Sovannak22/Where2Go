$(document).ready(function() {

    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        console.log(no);
        $(".preview-image.preview-show-"+no).remove();
        num--;
        images.splice(no, 1);
    });
});


var images=[];
var num = 0;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            images.push(file);
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
            console.log(images);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}

$('#event_upload').submit( function (){
    console.log(images);
    var formData = new FormData(this);
    for (i=0;i<images.length;i++){
        formData.append('image_'+i,images[i]);
    }
    // return false;
    $.ajax({
        url: window.location.origin+"/events/create",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});

