<h3 class="account-page-title">Новый альбом</h3>
<div class="account-page-content">
    <form class="file-form" action="" method="post" enctype="multipart/form-data">
        <p class="account-form-block">
            Название альбома:
            <input name="album_name" type="text" value="">
        </p>
        <p class="account-file-block">
            <input id="file-upload" name="album_files[]" type="file" multiple>
            <label class="file-upload-label" for="file-upload">
                <span>
                    <i class="fas fa-file-upload"></i>Загрузите или перетащите фото
                </span>
            </label>
        </p>
        <input id="album_btn" type="submit" value="сохранить данные">
    </form>
</div>
<style>
    .account-file-block{
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 300px;
        border: 3px solid #c90909;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 10px;
    }
    /*#file-upload{*/
    /*    position: absolute;*/
    /*    overflow: hidden;*/
    /*    width: 0.1px;*/
    /*    height: 0.1px;*/
    /*}*/
    .file-upload-label{
        width: 100%;
        height: 100%;
        background-color: #cdcdcd;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .fa-file-upload{
        margin-right: 5px;
    }
</style>
<script>
    var isAdvancedUpload = function() {
        var div = document.createElement('div');
        return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
    };
    var fileUploadLabel = $('.file-upload-label');

    if(isAdvancedUpload){
        var droppedFiles = false;

        fileUploadLabel.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
        }).on('dragover dragenter', function() {
                $('.file-upload-label').css('background-color', '#fff');
            })
            .on('dragleave dragend drop', function() {
                $('.file-upload-label').css('background-color', '#cdcdcd');
            })
            .on('drop', function(e) {
                droppedFiles = e.originalEvent.dataTransfer.files;

                $('#album_btn').click(function (e) {
                    e.preventDefault();

                    if(droppedFiles){
                        var ajaxData = {
                            // album_name: $('[name=album_name]').val(),
                            // album_files: droppedFiles[0],
                        };
                        // console.log(ajaxData);
                        // console.log(droppedFiles);
                        // droppedFiles.each(function () {
                        //
                        // })

                        $.ajax({
                            type: "POST",
                            url: "/upload",
                            data: {
                                'album_files' : droppedFiles[0],
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            // dataType: "json",
                            success: function (ans) {
                                // console.log($("[name=album_name]").val());
                                console.log(ans);
                            },
                            error: function (ans) {
                                console.log(ans);
                            }
                        });
                    }
                });
            });
        // if(droppedFiles){
        // console.log(droppedFiles);
        // }
    }

    $('#album_btn').click(function (e) {
        if(!droppedFiles){
            e.preventDefault();
            console.log($('#file-upload').prop('files'));
        }

        // var fileForm = $('.file-form');
        // var ajaxData = new FormData(fileForm.get(0));
        // $.each(e.originalEvent.dataTransfer.files, function(i, file) {
        //     ajaxData.append( i, file );
        // });

        // console.log(e.originalEvent.dataTransfer.files);
        // var formData = {
        //     album_name :  $('[name=album_name]').val(),
        //     album_files : $('[name=album_files]').prop('files')[0],
        // };
        // formData.append('file', file_data);

        // $.ajax({
        //     type: "POST",
        //     url: "/upload",
        //     data: {
        //         album_name :  $('[name=album_name]').val(),
        //         album_files : $('[name=album_files]').prop('files')[0],
        //     },
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     // dataType: "json",
        //     success: function (ans) {
        //         // console.log($("[name=album_name]").val());
        //         console.log(ans);
        //     },
        //     error: function (ans) {
        //         console.log(ans);
        //     }
        // });
    });
</script>