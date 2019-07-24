<h3 class="account-page-title">Моя галлерея</h3>
<div class="account-page-content">
    <div class="account-albums">
        <?php foreach($albums as $album): ?>
            <a href="/account/gallery/album/<?php echo $album['id'] ?>" class="account-album">
                <i class="fas fa-folder"></i>
                <span class="account-album-title"><?php echo $album['name'] ?></span>
            </a>
        <?php endforeach ?>
    </div>
</div>

<script>

</script>