<?php echo $header ?>
<main>
	<div id="wrapper">
		<div class="albums owl-carousel">
            <?php foreach($albums as $album_viewport): ?>
                <div class="albums-viewport">
                <?php foreach($album_viewport as $album): ?>
                    <div class="album">
                        <img src="<?php echo $album['main_img'] ?>" alt="">
                        <a class="album-cover" href="/album/<?php echo $album['id'] ?>">
                            <h3><?php echo $album['name'] ?></h3>
                            <span><?php echo $album['date_insert'] ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
		</div>
	</div>
</main>
<?php echo $footer ?>