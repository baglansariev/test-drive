<?php
    namespace core\lib;

    class Form
    {
        public $success_msg = array();
        public $error_msg = array();

        public function __construct()
        {
            $this->setErrorMsg();
            $this->setSuccessMsg();
        }

        public function setSuccessMsg()
        {
            $this->success_msg = [
                'register' => 'Вы успешно зарегистрировались!',
                'new_album' => 'Новый альбом успешно создан',
                'del_image' => 'Изображение успешно удалено!',
            ];
        }

        public function setErrorMsg()
        {
            $this->error_msg = [
                'new_album' => [
                    'has_album' => 'Такой альбом уже существует',
                    'wrong_type' => 'Тип файла должен быть одним из следующих: JPG, JPEG, PNG',
                    'wrong_type_additional' => 'Альбом создан! Дополнительые фото не соответствуют по типу (JPG, JPEG, PNG)',
                ],
                'register' => 'Произошла ошибка. Попробуйте заново.',
                'all_fields' => 'Заполните все поля',
                'login_pass' => 'Неправильный логин или пароль!',
                'has_place_name' => 'Такое название уже занято!',
                'has_email' => 'Такой E-mail адрес уже зарегистрирован',
                'is_email' => 'Некорректный E-mail адрес',
                'password_match' => 'Пароли не совпадают',
                'place_name_empty' => 'Поле "название заведения" не должно быть пустым',
                'email_empty' => 'Поле "E-mail" не должно быть пустым',
                'fullname_empty' => 'Поле "Ф.И.О. ответственного лица" не должно быть пустым',
                'password_empty' => 'Поле "Пароль" не должно быть пустым',
                'confirm_empty' => 'Поле "Подтверждение пароля" не должно быть пустым',
            ];
        }

        public function isEmail($email)
        {
            if(preg_match("#^([a-zA-Z]*[0-9]*\.*-*_*)+@([a-zA-Z]*\.[a-zA-Z]{2,3})$#", $email)){
                return true;
            }
            return false;
        }
    }