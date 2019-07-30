<?php echo $header ?>
<main>
    <div id="gallery" class="no-gutter-sizer">
        <div class="item-masonry sizer4">
            <img src="/public/images/8.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fas fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/3.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/4.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/5.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/girl.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/6.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/para.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fas fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/3.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/4.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/8.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/6.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/8.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/2.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fas fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="item-masonry sizer4">
            <img src="/public/images/3.jpg" alt="">
            <div class="cover-item-gallery">
                <a href="">
                    <i class="fa fa-plus fa-2x"></i>
                </a>
            </div>
        </div>
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
</script>