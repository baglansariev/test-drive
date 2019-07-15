$(function () {

    // Валидация формы регистрации
    $('#register_submit').click(function (e){
       e.preventDefault();
       $('.form-message-alert').remove();

       var place_name = $('[name="place_name"]');
       var user_fullname = $('[name="user_fullname"]');
       var user_email = $('[name="user_email"]');
       var user_password = $('[name="user_password"]');
       var user_confirm = $('[name="user_confirm"]');

       if(place_name.val() && user_fullname.val() && user_email.val() && user_password.val() && user_confirm.val()){
           $('.form-message-alert').remove();
           console.log(place_name.val() + ' ' + user_fullname.val() + ' ' + user_email.val() + ' ' + user_password.val() + ' ' + user_confirm.val());
       }
       else{
           if(!place_name.val()){
               place_name.before('<span class="form-message-alert">Поле "название заведения" не должно быть пустым</span>');
           }
           if(!user_fullname.val()){
               user_fullname.before('<span class="form-message-alert">Поле "Ф.И.О. ответственного лица" не должно быть пустым</span>');
           }
           if(!user_email.val()){
               user_email.before('<span class="form-message-alert">Поле "E-mail" не должно быть пустым</span>');
           }
           if(!user_password.val()){
              user_password.before('<span class="form-message-alert">Поле "Пароль" не должно быть пустым</span>');
           }
           if(!user_confirm.val()){
              user_confirm.before('<span class="form-message-alert">Поле "Подтверждение пароля" не должно быть пустым</span>');
           }
       }
    });
});