<?php echo $header ?>
<main>
    <div class="registration-form-container">
        <div class="registration-form">
            <p class="registration-form-heading">
                Регистрация
            </p>
            <form action="" method="post">
                <div class="registration-input-block">
                    <p class="registration-input-title">Название заведения:</p>
                    <input type="text" name="place_name">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Ф.И.О. ответственного лица:</p>
                    <input type="text" name="user_fullname">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">E-mail ответственного лица:</p>
                    <input type="text" name="user_email">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Пароль:</p>
                    <input type="password" name="user_password">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Подтверждение пароля:</p>
                    <input type="password" name="user_confirm">
                </div>
                <div class="buttons-block">
                    <input id="register_submit" type="submit" value="Регистрация">
                </div>
            </form>
        </div>
    </div>
</main>
<?php echo $footer ?>