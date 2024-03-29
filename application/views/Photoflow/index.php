<?php echo $header ?>
<main>
    <div id="gallery" class="no-gutter-sizer">
        <?php foreach($photos as $photo): ?>
            <div class="item-masonry sizer4">
                <img src="<?php echo $photo['thumbnail'] ?>" alt="">
                <div class="cover-item-gallery">
                    <a href="" class="flow-img-full" data-src="<?php echo $photo['img_url'] ?>" data-download="<?php echo $photo['download_url'] ?>" data-album-id="/album/<?php echo $photo['album_id'] ?>">
                        <i class="fas fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</main>
<?php echo $footer ?>

<style>
    .sizer1{
        width: 100%;
    }
    .sizer2{
        width: 50%;
    }
    .sizer4{
        width: 20%;
    }
    .item-masonry{
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .item-masonry img{
        width: 100%;
        height: auto;
        display: block;
    }
    .cover-item-gallery{
        width: 100%;
        background-color: rgba(0,0,0,0.7);
        position: absolute;
        top: 0;
        bottom: 0;
        color: #fff;
        display: none;
    }
    .cover-item-gallery a{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
    $('.item-masonry').hover(function () {
        $(this).find('.cover-item-gallery').fadeIn();
    },
    function () {
        $(this).find('.cover-item-gallery').fadeOut();
    });

    var sizer = '.sizer4';
    var container = $('#gallery');
    
    container.imagesLoaded(function () {
        container.masonry({
            itemSelector: ".item-masonry",
            columnWidth: sizer,
            percentPosition: true,
        });
    });

    $('.flow-img-full').click(function (e) {
        e.preventDefault();
        var img = $(this).data('src');
        var download = $(this).data('download');
        var album_src = $(this).data('album-id');
        $('body').append('<div class="album-image-cover"><div class="album-image-full"><img src="'+ img +'"><a href="' + album_src +'" class="album_src">Перейти в альбом</a><a href="' + download + '" class="img-download"><i class="fas fa-download"></i></a><span class="img-close"><i class="fas fa-times"></i></span></div></div>')

        $('.img-close').on('click', function () {
            $('.album-image-cover').remove();
        });
    });
</script>