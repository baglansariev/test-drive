<h3 class="account-page-title">Новый альбом</h3>
<div class="account-page-content">
    <form class="file-form" action="" method="post" enctype="multipart/form-data">
        <div class="account-form-block">
            Название альбома:
            <input name="album_name" type="text" value="" required>
        </div>
        <div class="account-form-block">
            Главное фото:
            <input id="main_file_upload" name="album_main_file" type="file" value="" required>
        </div>
        <div class="account-filter-block">
            Выберите фильтр для ваших фото:
            <div class="account-filters">
                <div class="account-filter" data-filter="gray">
                    <img src="/public/images/filter-examples/filter-gray.jpg" alt="">
                </div>
                <div class="account-filter" data-filter="green">
                    <img src="/public/images/filter-examples/filter-green.jpg" alt="">
                </div>
                <div class="account-filter" data-filter="purple">
                    <img src="/public/images/filter-examples/filter-purple.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="account-file-block">
            Дополнительные фото:
            <input id="file-upload" name="album_files[]" type="file" multiple>
            <label class="file-upload-label" for="file-upload">
                <span>
                    <i class="fas fa-file-upload"></i>
                    <span class="upload-msg">Загрузите или перетащите фото</span>
                </span>
            </label>
        </div>
        <input id="album_btn" type="submit" value="сохранить данные">
    </form>
</div>
<style>
    .file-form div{
        margin-bottom: 20px;
    }
    .account-filter-block{
        display: flex;
        flex-direction: column;
    }
    .account-filters{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .account-filter{
        width: 32%;
        height: 150px;
        overflow: hidden;
        border: 3px solid #cdcdcd;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        cursor: pointer;
        transition: all ease 0.4s;
    }
    .account-filter:hover{
        border-color: #c90909;
    }
    .account-filter img{
        width: 100%;
        height: auto;
    }
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
    // $('[name=account_filter]').css('display', 'inline');
    $('.account-filter').click(function(){
        var filter = $(this).data('filter');
        $('[name=account_filter]').remove();
        $('.account-filter').css('border-color', '#cdcdcd');
        $(this).css('border-color', '#c90909');
        $(this).append('<input type="text" name="account_filter" value="' + filter + '" hidden>');
    });





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

            formAjax(ajaxData)
        });
    }
    else{
        $('.file-form').submit(function (e) {
            e.preventDefault();
            var ajaxData = new FormData($('.file-form')[0]);

            formAjax(ajaxData)
        });
    }


    function formAjax(ajaxData){
        $.ajax({
            type: "POST",
            url: "/account/upload",
            data: ajaxData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.file-upload-label span').html('<i class="fas fa-spinner" style="color: #c90909"></i>'+ ' Идет загрузка файлов, подождите...');
            },
            success: function (ans) {
                if(ans.error_msg){
                    if(!alert(ans.error_msg)){
                        location.reload();
                    }
                }
                if(ans.success_msg){
                    if(!alert(ans.success_msg)){
                        location.reload();
                    }
                }
                console.log(ans);

            },
            error: function (ans) {
                if(!alert('Ошибка! Попробуйте позже...')){
                    location.reload();
                }
            }
        });
    }

</script>