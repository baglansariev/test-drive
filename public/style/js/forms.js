$(function () {

    // Валидация формы регистрации
    $('#register_submit').click(function (e){
       e.preventDefault();

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
               !$('.form-message-alert')[0]? place_name.before('<span class="form-message-alert">Поле "название заведения" не должно быть пустым</span>'): $('.form-message-alert')[0].remove();
           }
           else{
               $('.form-message-alert')[0].remove();
           }
           if(!user_fullname.val()){
               !$('.form-message-alert')[1]? user_fullname.before('<span class="form-message-alert">Поле "Ф.И.О. ответственного лица" не должно быть пустым</span>'): $('.form-message-alert')[1].remove();
           }
           else{
               $('.form-message-alert')[1].remove();
           }
           if(!user_email.val()){
               !$('.form-message-alert')[2]? user_email.before('<span class="form-message-alert">Поле "E-mail" не должно быть пустым</span>'): $('.form-message-alert')[2].remove();
           }
           else{
               $('.form-message-alert')[2].remove();
           }
           if(!user_password.val()){
               !$('.form-message-alert')[3]? user_password.before('<span class="form-message-alert">Поле "Пароль" не должно быть пустым</span>'): $('.form-message-alert')[3].remove();
           }
           else{
               $('.form-message-alert')[3].remove();
           }
           if(!user_confirm.val()){
               !$('.form-message-alert')[4]? user_confirm.before('<span class="form-message-alert">Поле "Подтверждение пароля" не должно быть пустым</span>'): $('.form-message-alert')[4].remove();
           }
           else{
               $('.form-message-alert')[4].remove();
           }
       }
    });
});