<?php echo $header ?>
<main>
    <?php if($album): ?>
        <div class="album-img-row" style="background-image: url('<?php echo $album['main_img'] ?>')">
            <p class="album-img-title">
                <?php echo $album['name'] ?>
                <span><?php echo $album['date'] ?></span>
            </p>
        </div>
    <?php endif ?>
    <?php if($images): ?>
        <div class="container album-images">
            <h3 class="section-title">Фото</h3>
            <div id="dg-container" class="dg-container">
                <div class="dg-wrapper">
                    <?php foreach($images as $image): ?>
                        <a href="" style="background-image: url('<?php echo $image['img_url'] ?>')" data-src="<?php echo $image['img_url'] ?>"></a>
                    <?php endforeach; ?>
                </div>
                <nav>
                    <span class="dg-prev">&lt;</span>
                    <span class="dg-next">&gt;</span>
                </nav>
            </div>
        </div>
    <?php endif ?>
    <?php if($videos): ?>
        <div class="album-videos">
            <div class="container">
                <h3 class="section-title">Видео</h3>
                <div class="owl-carousel">
                    <?php foreach($videos as $video): ?>
                        <video src="<?php echo $video['video_url'] ?>" class="item" controls></video>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</main>
<?php echo $footer ?>