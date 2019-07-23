<?php
    namespace controllers;
    use core\engine\Controller;

    class AccountController extends Controller
    {
        public function indexAction()
        {
            if(!$this->session->has('user')) {
                $this->response->redirect('/login');
            }

            $this->view->asset->setTitle('Личный кабинет');

            $data = array();
            $data['account_content'] = $this->load->controller('Account/personalData');
            $data['column_left'] = $this->load->controller('Account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            if($this->request->has('account_tab', 'post')){
                $this->response->addHeader('Content-Type: application/json; charset=UTF-8');
                $this->response->output(json_encode($data['account_content'], JSON_HEX_QUOT | JSON_HEX_TAG));
            }
            else{
                $this->view->response('Account/account', $data);
            }

        }

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

        public function logoutAction()
        {
            if($this->session->has('user')){
                $this->session->del('user');
            }
            $this->response->redirect('/login');
        }

        public function agreementAction()
        {
            $this->view->asset->setTitle('Условия соглашения');

            $data['account_content'] = $this->load->controller('account/agreement');

            if($this->request->has('account_tab', 'post')){
                $this->response->addHeader('Content-Type: application/json; charset=UTF-8');
                $this->response->output(json_encode($data['account_content'], JSON_HEX_QUOT | JSON_HEX_TAG));
            }
            else{
                $this->view->response('Account/account', $data);
            }
        }

        public function galleryAction()
        {
            $this->view->asset->setTitle('Моя галлерея');

            $data['account_content'] = $this->load->controller('account/myGallery');

            if($this->request->has('account_tab', 'post')){
                $this->response->addHeader('Content-Type: application/json; charset=UTF-8');
                $this->response->output(json_encode($data['account_content'], JSON_HEX_QUOT | JSON_HEX_TAG));
            }
            else{
                $this->view->response('Account/account', $data);
            }
        }

        public function newAlbumAction()
        {
            $this->view->asset->setTitle('Новый альбом');

            $data['account_content'] = $this->load->controller('account/upload');
            $data['column_left'] = $this->load->controller('account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('Account/account', $data);
        }

        public function fileUploadAction()
        {
            $data = array();


            if($this->request->has('album_name', 'post') && $this->request->has('album_main_file', 'files')){
                $album_name = $this->request->post['album_name'];
                $account_model = $this->load->model('account/account');

//                devPrint($this->session->get('resource'));

                $yandexRoot = $this->session->get('user')['resource']->getPath();
                $yandexNewAlbumPath = $yandexRoot . '/' . $album_name;
                $yandexNewAlbum = $this->yandexDisk->getResource($yandexNewAlbumPath);
                $yandexNewAlbum->create($yandexNewAlbumPath);

                if(!$account_model->hasAlbum($album_name, $this->session->get('user')['id'])){
                    $new_file_path = IMAGES_PATH . 'test/' . $this->request->files['album_main_file']['name'];
                    if(move_uploaded_file($this->request->files['album_main_file']['tmp_name'], $new_file_path)){
                        $yandexNewFile = $this->yandexDisk->getResource( $yandexNewAlbum->getPath() . '/' . $this->request->files['album_main_file']['name']);
                        if($yandexNewFile){
                            $yandexNewFile->upload($new_file_path);
                            unlink($new_file_path);
                        }
                    }
                    if($this->request->has('album_files', 'files')){
                        foreach($this->request->files['album_files']['name'] as $key => $val) {
                            if ($val) {
                                $new_file_path = IMAGES_PATH . 'test/' . $this->request->files['album_main_file']['name'][$key];
                                if(move_uploaded_file($this->request->files['album_files']['tmp_name'][$key], $new_file_path)){
                                    $yandexNewFile = $this->yandexDisk->getResource( $yandexNewAlbum->getPath() . '/' . $this->request->files['album_main_file']['name'][$key]);
                                    if($yandexNewFile){
                                        $yandexNewFile->upload($new_file_path);
                                        unlink($new_file_path);
                                    }
                                }
                            }
                        }
                    }
                }
                else{
                    $data['msg'] = '';
                }
            }
        }
    }

