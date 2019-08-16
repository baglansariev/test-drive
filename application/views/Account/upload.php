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
<!--        <div class="account-filter-block">-->
<!--            Выберите фильтр для ваших фото:-->
<!--            <div class="account-filters">-->
<!--                <div class="account-filter" data-filter="gray">-->
<!--                    <img src="/public/images/filter-examples/filter-gray.jpg" alt="">-->
<!--                </div>-->
<!--                <div class="account-filter" data-filter="green">-->
<!--                    <img src="/public/images/filter-examples/filter-green.jpg" alt="">-->
<!--                </div>-->
<!--                <div class="account-filter" data-filter="purple">-->
<!--                    <img src="/public/images/filter-examples/filter-purple.jpg" alt="">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
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
    <div class="preloader-cover">
        <div class="loader">
            <div class="l_main">
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
</div>
<style>
    .preloader-cover {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        top: 0;
        left: 0;
        overflow-x: hidden;
        display: none;
    }
    .loader{height:100%;width:100%}
    .loader .l_main{position:absolute;top:50%;left:50%;width:172px;height:128px;margin:0;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}
    @media (max-width:550px){.loader{-webkit-transform:scale(0.75);transform:scale(0.75)}}
    @media (max-width:440px){.loader{-webkit-transform:scale(0.5);transform:scale(0.5)}}
    .l_square{position:relative}
    .l_square:nth-child(1){margin-left:0px}
    .l_square:nth-child(2){margin-left:44px}
    .l_square:nth-child(3){margin-left:88px}
    .l_square:nth-child(4){margin-left:132px}
    .l_square span{position:absolute;top:0px;left:20px;height:36px;width:36px;border-radius:2px;background-color:#FFFFFF}
    .l_square span:nth-child(1){top:0px}
    .l_square span:nth-child(2){top:44px}
    .l_square span:nth-child(3){top:88px}
    .l_square:nth-child(1) span{-webkit-animation:animsquare1 2s infinite ease-in;animation:animsquare1 2s infinite ease-in}
    .l_square:nth-child(2) span{-webkit-animation:animsquare2 2s infinite ease-in;animation:animsquare2 2s infinite ease-in}
    .l_square:nth-child(3) span{-webkit-animation:animsquare3 2s infinite ease-in;animation:animsquare3 2s infinite ease-in}
    .l_square:nth-child(4) span{-webkit-animation:animsquare4 2s infinite ease-in;animation:animsquare4 2s infinite ease-in}
    .l_square span:nth-child(1){-webkit-animation-delay:0.00s;animation-delay:0.00s}
    .l_square span:nth-child(2){-webkit-animation-delay:0.15s;animation-delay:0.15s}
    .l_square span:nth-child(3){-webkit-animation-delay:0.30s;animation-delay:0.30s}
    @-webkit-keyframes animsquare1{0%,5%,95%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}30%,70%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @keyframes animsquare1{0%,5%,95%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}30%,70%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @-webkit-keyframes animsquare2{0%,10%,90%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}35%,65%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @keyframes animsquare2{0%,10%,90%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}35%,65%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @-webkit-keyframes animsquare3{0%,15%,85%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}40%,60%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @keyframes animsquare3{0%,15%,85%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}40%,60%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @-webkit-keyframes animsquare4{0%,20%,80%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}45%,55%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
    @keyframes animsquare4{0%,20%,80%,100%{-webkit-transform:translate(0px,0px) rotate(0deg);transform:translate(0px,0px) rotate(0deg)}45%,55%{-webkit-transform:translate(-40px,0px) rotate(-90deg);transform:translate(-40px,0px) rotate(-90deg)}}
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
                $('.preloader-cover').fadeIn();
            },
            success: function (ans) {
                $('.preloader-cover').fadeOut();
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
                $('.preloader-cover').fadeOut();
                if(!alert('Ошибка! Попробуйте позже...')){
                    location.reload();
                }
            }
        });
    }

</script>