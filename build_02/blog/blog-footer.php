<script type="text/javascript" src="../resources/summernote/summernote.min.js"></script>
<script type="text/javascript">

    /*Inits summernote with custom functions*/
    $(document).ready(function() {
        $('.summernote').summernote({
            height: ($(window).height() - 300),

            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
                //onMediaDelete : function(image) {
                //    deleteImage(image[0])
                //}
            }
        });
    });

    /* Uploads images to a folder on the server when added to summernote */
    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: 'blog-image-upload.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(url) {
                var image = $('<img>').attr('src', '' + url);
                $('.summernote').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    /* Deletes images from server when removed from summernote */
    /*function deleteImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: 'img_delete.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            error: function(data) {
                console.log(data);
            }
        });
    }*/

</script>
