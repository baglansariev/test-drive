<h3 class="account-page-title">Новый альбом</h3>
<div class="account-page-content">
    <form action="" method="post" enctype="multipart/form-data">
        <p class="account-form-block">
            Название альбома:
            <input name="album_name" type="text" value="">
        </p>
        <p class="account-form-block">
            Выберите файлы:
            <input name="album_files" type="file" multiple>
        </p>
        <input id="album_btn" type="submit" value="сохранить данные">
    </form>
</div>

<script>
    $('#album_btn').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/upload",
            data: {'album_name' : $("[name=album_files]").val()},
            // dataType: "json",
            success: function (ans) {
                // console.log($("[name=album_name]").val());
                console.log(ans);
            },
            error: function (ans) {
                console.log(ans);
            }
        });
    });
</script>