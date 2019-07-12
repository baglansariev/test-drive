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
                    <input type="text" name="name">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Ф.И.О. ответственного лица:</p>
                    <input type="text" name="login">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">E-mail ответственного лица:</p>
                    <input type="text" name="login">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Пароль:</p>
                    <input type="password" name="login">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Подтверждение пароля:</p>
                    <input type="password" name="login">
                </div>
                <div class="buttons-block">
                    <input type="submit" value="Регистрация">
                </div>
            </form>
        </div>
    </div>
</main>
<?php echo $footer ?>