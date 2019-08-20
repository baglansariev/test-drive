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
            <div class="album-images-wrapper owl-carousel">
                <?php foreach ($images as $image): ?>
                    <div class="album-image item" style="background-image: url('<?php echo $image['thumbnail'] ?>')" data-src="<?php echo $image['img_url'] ?>" data-download="<?php echo $image['download_url'] ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif ?>
    <?php if($videos): ?>
        <div class="album-videos">
            <div class="container">
                <h3 class="section-title">Видео</h3>
                <div class="video-gallery">
                    <?php foreach ($videos as $video): ?>
                        <div class="video-container">
                            <video src="<?php echo $video['video_url'] ?>" controls></video>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</main>
<?php echo $footer ?>
