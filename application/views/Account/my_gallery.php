<h3 class="account-page-title">Моя галлерея</h3>
<div class="account-page-content">
    <div class="account-albums">
        <?php foreach($albums as $album): ?>
            <div class="account-album">
                <a href="/account/gallery/album/<?php echo $album['id'] ?>">
                    <i class="fas fa-folder"></i>
                    <span class="account-album-title"><?php echo $album['name'] ?></span>
                </a>
                <span class="del-album" title="Удалить" data-id="<?php echo $album['id'] ?>">X</span>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    $('.del-album').click(function () {
        $.ajax({
            type: "POST",
            url: "/account/gallery",
            data: {album_del: $(this).data('id')},
            success: function (ans) {
                if(!alert('Альбом успешно удален!')){
                    location.reload();
                };
            },
        });
    });
</script>