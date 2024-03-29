<?php echo $header ?>
<main>
    <div class="registration-form-container">
        <div class="registration-form">
            <p class="registration-form-heading">
                Регистрация
            </p>
            <i class="form-message-success"><?php if(isset($register_msg)) echo $register_msg ?></i>
            <form action="" method="post">
                <div class="registration-input-block">
                    <p class="registration-input-title">Название заведения:</p>
                    <i class="form-message-alert"><?php if(isset($place_name_msg)) echo $place_name_msg ?></i>
                    <input type="text" name="user[place_name]" value="<?php if(isset($_POST['user']['place_name'])) echo $_POST['user']['place_name'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Ф.И.О. ответственного лица:</p>
                    <i class="form-message-alert"><?php if(isset($fullname_msg)) echo $fullname_msg ?></i>
                    <input type="text" name="user[fullname]" value="<?php if(isset($_POST['user']['fullname'])) echo $_POST['user']['fullname'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">E-mail ответственного лица:</p>
                    <i class="form-message-alert"><?php if(isset($email_msg)) echo $email_msg ?></i>
                    <input type="text" name="user[email]" value="<?php if(isset($_POST['user']['email'])) echo $_POST['user']['email'] ?>">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Пароль:</p>
                    <i class="form-message-alert"><?php if(isset($password_msg)) echo $password_msg ?></i>
                    <input type="password" name="user[password]">
                </div>
                <div class="registration-input-block">
                    <p class="registration-input-title">Подтверждение пароля:</p>
                    <input type="password" name="user[confirm]">
                </div>
                <div class="registration-input-block">
                    <p class="register-agreement">
                        Нажимая на кнопку "Регистрация" вы подтверждаете что соглашаетесь с <a href="#">условиями соглашения</a> сайта
                    </p>
                </div>
                <div class="buttons-block">
                    <input id="register_submit" type="submit" value="Регистрация">
                </div>
            </form>
        </div>
    </div>
    <div class="agreement-cover">
        <img src="/public/images/agreement/agr1.jpg" alt="">
        <img src="/public/images/agreement/agr2.jpg" alt="">
        <img src="/public/images/agreement/agr3.jpg" alt="">
        <img src="/public/images/agreement/agr4.jpg" alt="">
        <img src="/public/images/agreement/agr5.jpg" alt="">
    </div>
</main>
<?php echo $footer ?>

<script>
    $('.register-agreement a').click(function (e) {
        e.preventDefault();
        $('.agreement-cover').fadeIn();
    });
    $('.agreement-cover').click(function (e) {
        if(e.target !== $('.agreement-cover img')){
            $('.agreement-cover').fadeOut();
        }
    });
</script>
