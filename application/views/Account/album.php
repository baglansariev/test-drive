<h3 class="account-page-title">Паленшеев Тугенше</h3>
<div class="account-page-content">
    <div class="account-album-images">
        <?php foreach($images as $image): ?>
            <div class="account-album-image" style="background-image: url('<?php echo $image ?>')">
                <span class="img-cover">
                    <a class="img-action view" href="<?php echo $image ?>">ПРОСМОТР</a>
                    <a class="img-action main" href="">Сделать главным</a>
                    <a class="img-action delete" href="">Удалить</a>
                </span>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    $('.account-album-image').on('mouseover', function(){
        $(this).children('.img-cover').animate({
            top: '0',
        }, 400);
    });

    $('.account-album-image').on('mouseleave', function(){
        $(this).children('.img-cover').animate({
            top: '100%',
        }, 400);
    });

    $('.img-action.view').click(function(e){
        e.preventDefault();
        var img_href = $(this).attr('href');
        $('body').append('<div class="img-view-cover"><div class="view-img"><img src="' + img_href + '"></div></div>');
        console.log($(this).attr('href'));

    });
</script>

<!-- https://codd-wd.ru/sozdanie-prevyu-izobrazhenij-s-pomoshhyu-html5-file-api-i-jquery/  -->
<!-- https://cimage.se/doc/gdfilter  -->
<!-- http://keyword1109.blogspot.com/2012/10/php-gd.html  -->
<!-- https://github.com/una/CSSgram  -->
<!-- https://github.com/metafizzy/packery  -->