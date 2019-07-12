<?php echo $header?>
<main>
    <div class="login-form-container">
        <div class="login-form">
            <p class="login-form-heading">
                Авторизация
            </p>
            <form action="" method="post">
                <div class="login-block">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login" placeholder="Имя пользователя">
                </div>
                <div class="password-block">
                    <i class="fas fa-unlock-alt"></i>
                    <input type="text" name="login" placeholder="Пароль">
                </div>
                <div class="buttons-block">
                    <p class="registration">
                        <a href="/register">Регистрация</a>
                    </p>
                    <input type="submit" value="Вход">
                </div>
            </form>
        </div>
    </div>
</main>
<?php echo $footer?>