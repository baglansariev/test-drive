<div class="account-place-name">
    <a href="/account"><?php echo $user_fullname ?></a>
</div>
<ul class="account-menu">
    <a href="" class="menu-point" data-url="/account">
        <i class="fas fa-caret-right"></i>
        <li>Личные данные</li>
    </a>
    <a href="" class="menu-point">
        <i class="fas fa-caret-right"></i>
        <li>Видео обучение</li>
    </a>
    <a href="" class="menu-point" data-url="/agreement">
        <i class="fas fa-caret-right"></i>
        <li>Условия соглашения</li>
    </a>
    <a href="" class="menu-point" data-url="/gallery">
        <i class="fas fa-caret-right"></i>
        <li>Моя галерея</li>
    </a>
    <a href="/logout">
        <i class="fas fa-caret-right"></i>
        <li>Выход</li>
    </a>
</ul>
<div class="photo-add-link">
    <a href="/upload" class="photo-add btn-danger">Добавить альбом</a>
</div>

<script type="text/javascript">
    $('.menu-point').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            type: "POST",
            data: {account_tab: true},
            url: url,
            dataType: "json",
            success: function(ans){
                for(var i = 0; i < $('.menu-point').length; i++){
                    if($($('.menu-point')[i]).data('url') == url){
                        $($('.menu-point')[i]).css('border-color', '#c90909');
                    }
                    else{
                        $($('.menu-point')[i]).css('border-color', '#cdcdcd');
                    }
                }
                $('.account-content').html(ans);
                console.log(url);
            },
            error: function(ans){
                console.log(ans);
            }
        });
    });
</script>