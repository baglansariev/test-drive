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
                    <i class="form-message-alert"><?php echo $place_name_msg ?></i>
                    <input type="text" name="place_name" value="<?php if(isset($_POST['place_name'])) echo $_POST['place_name'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Ф.И.О. ответственного лица:</p>
                    <i class="form-message-alert"><?php echo $user_fullname_msg ?></i>
                    <input type="text" name="user_fullname" value="<?php if(isset($_POST['user_fullname'])) echo $_POST['user_fullname'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">E-mail ответственного лица:</p>
                    <i class="form-message-alert"><?php echo $user_email_msg ?></i>
                    <input type="text" name="user_email" value="<?php if(isset($_POST['user_email'])) echo $_POST['user_email'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Пароль:</p>
                    <i class="form-message-alert"><?php echo $user_password_msg ?></i>
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