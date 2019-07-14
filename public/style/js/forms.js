$(function () {

    // Валидация формы регистрации
    $('#register_submit').click(function (e){
       e.preventDefault();

       var place_name = $('[name="place_name"]').val();
       var user_fullname = $('[name="user_fullname"]').val();
       var user_email = $('[name="user_email"]').val();
       var user_password = $('[name="user_password"]').val();
       var user_confirm = $('[name="user_confirm"]').val();

       if(place_name && user_fullname && user_email && user_password && user_confirm){
           console.log(place_name + ' ' + user_fullname + ' ' + user_email + ' ' + user_password + ' ' + user_confirm);
       }
       else{
           if(!place_name){
               console.log('Поле "название заведения" не должно быть пустым');
           }
           if(!user_fullname){
               console.log('Поле "Ф.И.О. ответственного лица" не должно быть пустым');
           }
           if(!user_email){
               console.log('Поле "E-mail" не должно быть пустым');
           }
           if(!user_password){
               console.log('Поле "Пароль" не должно быть пустым');
           }
           if(!user_confirm){
               console.log('Поле "Подтверждение пароля" не должно быть пустым');
           }
       }
    });
});