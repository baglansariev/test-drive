<?php echo $header ?>
<main>
    <div class="account">
        <aside>
            <div class="account-place-name">
                <a href="">Мейрамхана</a>
            </div>
            <ul class="account-menu">
                <a href="/account">
                    <i class="fas fa-caret-right"></i>
                    <li>Личные данные</li>
                </a>
                <a href="">
                    <i class="fas fa-caret-right"></i>
                    <li>Видео обучение</li>
                </a>
                <a href="/agreement">
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
        </aside>
        <div class="account-content">
            <h3 class="account-page-title">Личные данные</h3>
            <div class="account-page-content">
                <form action="" class="account-personal-data">
                    <p class="account-form-block">
                        Название заведения:
                        <input type="text" value="Мейрамхана">
                    </p>
                    <p class="account-form-block">
                        ФИО ответственного:
                        <input type="text" value="Паленшеев Тугенше">
                    </p>
                    <p class="account-form-block">
                        E-mail ответственного:
                        <input type="text" value="example@example.com">
                    </p>
                    <p class="account-form-block">
                        Старый пароль:
                        <input type="password">
                    </p>
                    <p class="account-form-block">
                        Новый пароль:
                        <input type="password">
                    </p>
                    <p class="account-form-block">
                        Подтверждение нового пароля:
                        <input type="password">
                    </p>
                    <input type="submit" value="сохранить данные">
                </form>
            </div>
        </div>
    </div>
</main>
<?php echo $footer ?>