<?php
    namespace controllers;
    use core\engine\Controller;

    class AccountController extends Controller
    {
        // Страница Личный Кабинет
        public function indexAction()
        {
            if(!$this->session->has('user')) {
                $this->response->redirect('/login');
            }

            $this->view->asset->setTitle('Личный кабинет');

            $data = array();
            $data['account_content'] = $this->load->controller('account/personalData');
            $data['column_left'] = $this->load->controller('account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('Account/account', $data);

        }

        // Страница Входа
        public function loginAction()
        {
            if($this->session->has('user')){
                $this->response->redirect('/account');
            }

            $this->view->asset->setTitle('Вход');

            $login_model = $this->load->model('account/account');
            $data = array();
            $data['login_msg_class'] = 'form-message-alert';

            if(!empty($this->request->post)){
                if($this->request->has('user_email', 'post') && $this->request->has('user_password', 'post')){
                    $user_email = $this->request->post['user_email'];
                    $user_password = $this->request->post['user_password'];

                    if($this->form->isEmail($user_email)){
                        $user = $login_model->getUserFullData($user_email);

                        if($user && password_verify($user_password, $user['user_password'])){
                            $this->session->set('user', [
                                'auth' => true,
                                'id' => $user['user_id'],
                                'email' => $user['user_email'],
                                'status' => $user['user_status'],
                                'fullname' => $user['user_fullname'],
                                'place_name' => $user['place_name'],
                                // Вход в именную папку пользователя в Яндекс Диск
                                'resource' => $this->yandexDisk->getResource($user['place_name']),
                            ]);

                            $this->response->redirect('/account');
                        }
                        else{
                            $data['login_msg'] = $this->form->error_msg['login_pass'];
                        }
                    }
                    else{
                        $data['login_msg'] = $this->form->error_msg['is_email'];
                    }
                }
                else{
                    $data['login_msg'] = $this->form->error_msg['all_fields'];
                }
            }

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Account/login', $data);
        }

        // Страница регистрации
        public function registerAction()
        {
            if($this->session->has('user')){
                $this->response->redirect('/account');
            }

            $this->view->asset->setTitle('Регистрация');
            $this->view->asset->setJs('/public/style/js/forms.js');

            $register_model = $this->load->model('account/account');
            $data = array();

            if(!empty($this->request->post)){
                if($this->request->has(['user' => 'place_name'], 'post') &&
                    $this->request->has(['user' => 'fullname'], 'post') &&
                    $this->request->has(['user' => 'email'], 'post') &&
                    $this->request->has(['user' => 'password'], 'post') &&
                    $this->request->has(['user' => 'confirm'], 'post')
                ){
                    foreach ($this->request->post['user'] as $key => $val) {
                        $$key = $this->request->post['user'][$key];
                    }

                    if($this->form->isEmail($email)){
                        if(!$register_model->hasEmail($email) && !$register_model->hasPlace($place_name)){
                            if($password == $confirm){
                                $password = password_hash($password, PASSWORD_DEFAULT);

                                $data['register_msg'] = $this->form->error_msg['register'];

                                if($register_model->registerNewUser($place_name, $fullname, $email, $password)){
                                    $data['register_msg'] = $this->form->success_msg['register'];

                                    // При регистрации создается корневая папка пользователя в Яндекс Диск
                                    $resource = $this->yandexDisk->getResource($place_name);
                                    $resource->create($place_name);
                                }
                            }
                            else{
                                $data['password_msg'] = $this->form->error_msg['password_match'];
                            }
                        }
                        else{
                            $data['email_msg'] = $this->form->error_msg['has_email'];
                            $data['place_name_msg'] = $this->form->error_msg['has_place_name'];
                        }
                    }
                    else{
                        $data['email_msg'] = $this->form->error_msg['is_email'];
                    }
                }
                else{
                    foreach ($this->request->post['user'] as $key => $val) {
                        if(!$this->request->has(['user' => $key])) $data[$key . '_msg'] = $this->form->error_msg[$key . '_empty'];
                    }
                }
            }

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Account/register', $data);
        }

        // Страница Выхода
        public function logoutAction()
        {
            if($this->session->has('user')){
                $this->session->del('user');
            }
            $this->response->redirect('/login');
        }

        // Моя галерея
        public function galleryAction()
        {
            $this->view->asset->setTitle('Моя галлерея');

            $data['account_content'] = $this->load->controller('account/myGallery');

            $data['column_left'] = $this->load->controller('account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('Account/account', $data);
        }

        // Альбом
        public function albumAction()
        {
            $this->view->asset->setTitle('Новый альбом');

            $data['account_content'] = $this->load->controller('account/upload');
            $data['column_left'] = $this->load->controller('account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('Account/account', $data);
        }

        // Новый Альбом
        public function newAlbumAction()
        {
            $this->view->asset->setTitle('Новый альбом');

            $data['account_content'] = $this->load->controller('account/upload');
            $data['column_left'] = $this->load->controller('account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('Account/account', $data);
        }

        // Загрузка файлов
        public function fileUploadAction()
        {
            $data = array();
            $filter = false;

            if($this->request->has('album_name', 'post') && $this->request->has('album_main_file', 'files')){

                $type = $this->imageEditor->getImageType($this->request->files['album_main_file']['type']);

                $this->imageEditor->hasType($this->response, $type, $this->form->error_msg['new_album']['wrong_type']);

                $album_name = $this->request->post['album_name'];
                $account_model = $this->load->model('account/account');

                // ** Загрузка главного фото альбома ** Если такого альбома нет в БД
                if(!$account_model->hasAlbum($album_name, $this->session->get('user')['id'])){

                    // Получаем путь корневой папки Компании в Яндекс Диск
                    $yandexRoot = $this->session->get('user')['resource']->getPath();
                    // Путь нового альбома в Яндекс Диск
                    $yandexNewAlbumPath = $yandexRoot . '/' . $album_name;
                    // Получаем ресурс Яндекс Диска с данным Путем
                    $yandexNewAlbum = $this->yandexDisk->getResource($yandexNewAlbumPath);
                    // Создаем новую папку в Яндекс Диске с данным Путем
                    $yandexNewAlbum->create($yandexNewAlbumPath);
                    // Создаем папку для видео
                    $yandexVideoDir = $this->yandexDisk->getResource($yandexNewAlbum->getPath() . '/video');
                    $yandexVideoDir->create($yandexNewAlbum->getPath() . '/video');
                    // Создаем папку для фото
                    $yandexPhotoDir = $this->yandexDisk->getResource($yandexNewAlbum->getPath() . '/photo');
                    $yandexPhotoDir->create($yandexNewAlbum->getPath() . '/photo');

                    // Получаем путь создаваемого файла в новой папке
                    $yandexNewFilePath = $yandexPhotoDir->getPath() . '/' . $this->request->files['album_main_file']['name'];

                    // Сохраняем уменьшенную копию изображения на сервере
                    $this->imageEditor->resizeImage($this->request->files['album_main_file']['tmp_name'], $this->request->files['album_main_file']['name'], $album_name, $type);
                    $new_thumbnail_path = $this->imageEditor->thumbnail_dir . $album_name . '/' . $this->request->files['album_main_file']['name'];

                    // Записываем в БД данные нового альбома
                    $account_model->setNewAlbum($album_name, $yandexNewAlbumPath, $yandexNewFilePath, $new_thumbnail_path, $this->session->get('user')['id']);
                    // Получаем данные альбома с БД
                    $album = $account_model->getAlbum($album_name);
                    // Получаем локальный путь нового файла
                    $new_file_path = $this->imageEditor->transfer_dir . $this->request->files['album_main_file']['name'];

                    if(move_uploaded_file($this->request->files['album_main_file']['tmp_name'], $new_file_path)){
                        // Ставим водяной знак компании
                        $this->imageEditor->imageStamp($new_file_path, $type);
                        // Применяем фильтр для фото
                        $this->imageEditor->imgSetFilter($new_file_path, $type);
                        // Получаем ресурс Яндекс Диска с Путем нового файла
                        $yandexNewFile = $this->yandexDisk->getResource($yandexNewFilePath);
                        if(!$yandexNewFile->has()){
                            // Если такого файла нет загружаем его в Яндекс Диск
                            $yandexNewFile->upload($new_file_path);
                            // Записываем данные изображения в БД
                            $account_model->setNewImage($yandexNewFile->getPath(), $new_thumbnail_path, $album['id']);
                            // Удаляем файл в локальной директории
                            unlink($new_file_path);
                        }
                    }
                    // ** Загрузка дополнительных фото и видео **
                    if($this->request->has('album_files', 'files')){
                        if(is_array($this->request->files['album_files']['name'])){
                            foreach($this->request->files['album_files']['name'] as $key => $val) {
                                if ($val) {
                                    $type = $this->imageEditor->getFileType($this->request->files['album_files']['type'][$key]);

                                    $this->imageEditor->hasType($this->response, $type, $this->form->error_msg['new_album']['wrong_type_additional']);
                                    // Сохраняем уменьшенную копию изображения на сервере
                                    $this->imageEditor->resizeImage($this->request->files['album_files']['tmp_name'][$key], $this->request->files['album_files']['name'][$key], $album_name, $type);
                                    $new_thumbnail_path = $this->imageEditor->thumbnail_dir . $album_name . '/' . $this->request->files['album_files']['name'][$key];

                                    $new_file_path = $this->imageEditor->transfer_dir . $this->request->files['album_files']['name'][$key];
                                    if(move_uploaded_file($this->request->files['album_files']['tmp_name'][$key], $new_file_path)){
                                        // Загрузка фото
                                        if($this->imageEditor->isPhoto($type)){
                                            // Ставим водяной знак компании
                                            $this->imageEditor->imageStamp($new_file_path, $type);
                                             // Применяем фильтр для фото
                                            $this->imageEditor->imgSetFilter($new_file_path, $type);
                                            $yandexNewFile = $this->yandexDisk->getResource( $yandexPhotoDir->getPath() . '/' . $this->request->files['album_files']['name'][$key]);
                                            if($yandexNewFile){
                                                $yandexNewFile->upload($new_file_path);
                                                $account_model->setNewImage($yandexNewFile->getPath(), $new_thumbnail_path, $album['id']);
                                                unlink($new_file_path);
                                            }
                                        }
                                        // Загрузка видео
                                        else{
                                            $yandexNewFile = $this->yandexDisk->getResource( $yandexVideoDir->getPath() . '/' . $this->request->files['album_files']['name'][$key]);
                                            if($yandexNewFile){
                                                $yandexNewFile->upload($new_file_path);
                                                $account_model->setNewVideo($yandexNewFile->getPath(), $album['id']);
                                                unlink($new_file_path);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        else{
                            $type = $this->imageEditor->getFileType($this->request->files['album_files']['type']);

                            $this->imageEditor->hasType($this->response, $type, $this->form->error_msg['new_album']['wrong_type_additional']);

                            // Сохраняем уменьшенную копию изображения на сервере
                            $this->imageEditor->resizeImage($this->request->files['album_files']['tmp_name'], $this->request->files['album_files']['name'], $album_name, $type);
                            $new_thumbnail_path = $this->imageEditor->thumbnail_dir . $album_name . '/' . $this->request->files['album_files']['name'];

                            $new_file_path = $this->imageEditor->transfer_dir . $this->request->files['album_files']['name'];
                            if(move_uploaded_file($this->request->files['album_files']['tmp_name'], $new_file_path)){
                                // Загрузка фото
                                if($this->imageEditor->isPhoto($type)){
                                    // Ставим водяной знак компании
                                    $this->imageEditor->imageStamp($new_file_path, $type);
                                    // Применяем фильтр для фото
                                    $this->imageEditor->imgSetFilter($new_file_path, $type);
                                    $yandexNewFile = $this->yandexDisk->getResource( $yandexPhotoDir->getPath() . '/' . $this->request->files['album_files']['name']);
                                    if($yandexNewFile){
                                        $yandexNewFile->upload($new_file_path);
                                        $account_model->setNewImage($yandexNewFile->getPath(), $new_thumbnail_path, $album['id']);
                                        unlink($new_file_path);
                                    }
                                }
                                // Загрузка видео
                                else{
                                    $yandexNewFile = $this->yandexDisk->getResource( $yandexVideoDir->getPath() . '/' . $this->request->files['album_files']['name']);
                                    if($yandexNewFile){
                                        $yandexNewFile->upload($new_file_path);
                                        $account_model->setNewVideo($yandexNewFile->getPath(), $album['id']);
                                        unlink($new_file_path);
                                    }
                                }
                            }
                        }
                        $json['success_msg'] = $this->form->success_msg['new_album'];
                        $this->response->outputJSON($json);
                    }
                }
                else{
                    $json['error_msg'] = $this->form->error_msg['new_album']['has_album'];
                    $this->response->outputJSON($json);
                }
            }
        }
    }

