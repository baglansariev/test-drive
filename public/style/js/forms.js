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
           if(user_password.val() === user_confirm.val()){
               var register_data = {
                   place_name: place_name.val(),
                   user_fullname: user_fullname.val(),
                   user_email: user_email.val(),
                   user_password: user_password.val(),
                   user_confirm: user_confirm.val(),
               };

               $.ajax({
                   type: "POST",
                   url: "test-drive:8080/register",
                   data: register_data,
                   dataType: "json",
                   success: function(ans){
                       // if(ans.error){
                       //
                       // }
                       console.log(ans);
                   },
               });
           }
           else{
               user_password.before('<span class="form-message-alert">Пароли не совпадают</span>');
           }
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