<?php echo $header?>
<main>
    <div class="login-form-container">
        <div class="login-form">
            <p class="login-form-heading">
                Авторизация
            </p>
            <i class="<?php echo $login_msg_class ?>"><?php echo $login_msg ?></i>
            <form action="" method="post">
                <div class="login-block">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_email" placeholder="E-mail">
                </div>
                <div class="password-block">
                    <i class="fas fa-unlock-alt"></i>
                    <input type="password" name="user_password" placeholder="Пароль">
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