<h3 class="account-page-title">Личные данные</h3>
<div class="account-page-content">
    <form action="" class="account-personal-data">
        <p class="account-form-block">
            Название заведения:
            <input type="text" value="<?php echo $user_place ?>">
        </p>
        <p class="account-form-block">
            ФИО ответственного:
            <input type="text" value="<?php echo $user_fullname ?>">
        </p>
        <p class="account-form-block">
            E-mail ответственного:
            <input type="text" value="<?php echo $user_email ?>">
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