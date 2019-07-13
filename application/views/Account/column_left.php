<div class="account-place-name">
    <a href="">Мейрамхана</a>
</div>
<ul class="account-menu">
    <a href="" data-url="/account">
        <i class="fas fa-caret-right"></i>
        <li>Личные данные</li>
    </a>
    <a href="">
        <i class="fas fa-caret-right"></i>
        <li>Видео обучение</li>
    </a>
    <a href="" data-url="/agreement">
        <i class="fas fa-caret-right"></i>
        <li>Условия соглашения</li>
    </a>
    <a href="">
        <i class="fas fa-caret-right"></i>
        <li>Моя галерея</li>
    </a>
    <a href="">
        <i class="fas fa-caret-right"></i>
        <li>Выход</li>
    </a>
</ul>

<script type="text/javascript">
    $('.account-menu a').click(function(e){
        e.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            type: "POST",
            data: {account_tab: true},
            url: url,
            dataType: "json",
            success: function(ans){
                $('.account-content').html(ans);
            },
        });
    });
</script>