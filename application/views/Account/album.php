<h3 class="account-page-title">Паленшеев Тугенше</h3>
<div class="account-page-content">
    <div class="account-album-images">
        <?php foreach($images as $image): ?>
            <div class="account-album-image">
                <img src="<?php echo $image ?>" alt="">
                <span class="img-cover">
                    <a class="img-action" href="">ПРОСМОТР</a>
                    <a class="img-action" href="">Сделать главным</a>
                    <a class="img-action" href="">Удалить</a>
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
</script>