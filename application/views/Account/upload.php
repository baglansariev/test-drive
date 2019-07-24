<h3 class="account-page-title">Новый альбом</h3>
<div class="account-page-content">
    <form class="file-form" action="" method="post" enctype="multipart/form-data">
        <p class="account-form-block">
            Название альбома:
            <input name="album_name" type="text" value="" required>
        </p>
        <p class="account-form-block">
            Главное фото:
            <input id="main_file_upload" name="album_main_file" type="file" value="" required>
        </p>
        <p class="account-file-block">
            Дополнительные фото:
            <input id="file-upload" name="album_files[]" type="file" multiple>
            <label class="file-upload-label" for="file-upload">
                <span>
                    <i class="fas fa-file-upload"></i>
                    <span class="upload-msg">Загрузите или перетащите фото</span>
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
    #file-upload{
        position: absolute;
        overflow: hidden;
        width: 0.1px;
        height: 0.1px;
    }
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
    var droppedFiles = 'notDrag';

    if(isAdvancedUpload){
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

                $('.upload-msg').text('Количество файлов: '+ droppedFiles.length);


            });
    }

    $('#file-upload').on('change', function () {
        $('.upload-msg').text('Количество файлов: '+ $('#file-upload').prop('files').length);
    });

    if(droppedFiles){
        $('.file-form').submit(function (e) {
            e.preventDefault();

            ajaxData = new FormData($('.file-form')[0]);

            $(droppedFiles).each(function () {
                ajaxData.append($('#file-upload').attr('name'), this);
            });

            $(droppedFiles).each(function () {
                ajaxData.append($('#main_file-upload').attr('name'), this);
            });
            // console.log('test');

            $.ajax({
                type: "POST",
                url: "/upload",
                data: ajaxData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.upload-msg').html('<i class="fas fa-spinner" style="color: #c90909"></i>'+ ' Идет загрузка файлов');
                    $('.fa-spinner').animate({
                        // transform: 'rotateY(360deg)',
                        fontSize: '26px',
                    }, 600).animate({
                        // transform: 'rotateY(360deg)',
                        fontSize: '16px',
                    }, 600);
                },
                success: function (ans) {
                    console.log(ans);
                    $('.upload-msg').text('Загрузка файлов успешно завершена!');
                },
                error: function (ans) {
                    console.log(ans);
                }
            });
        });
    }
    else{
        $('.file-form').submit(function (e) {
            e.preventDefault();
            var ajaxData = new FormData($('.file-form')[0]);

            $.ajax({
                type: "POST",
                url: "/upload",
                data: ajaxData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.upload-msg').html('<i class="fas fa-spinner" style="color: #c90909"></i>'+ ' Идет загрузка файлов');
                    $('.fa-spinner').animate({
                        // transform: 'rotateY(360deg)',
                        fontSize: '26px',
                    }, 600).animate({
                        // transform: 'rotateY(360deg)',
                        fontSize: '16px',
                    }, 600);
                },
                success: function (ans) {
                    console.log(ans);
                    $('.upload-msg').text('Загрузка файлов успешно завершена!');
                },
                error: function (ans) {
                    console.log(ans);
                }
            });
        });
    }

</script>