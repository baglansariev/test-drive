<?php
    namespace application\controllers;
    use application\core\engine\Controller;

    class AccountController extends Controller
    {
        public function indexAction()
        {
            if($this->session->has('auth') && $this->session->get('auth')){

                $this->view->asset->setTitle('Личный кабинет');

                $data = array();
                $data['account_content'] = $this->load->controller('Account/personalData');

                $data['column_left'] = $this->load->controller('Account/columnLeft');
                $data['header'] = $this->load->controller('common/header');
                $data['footer'] = $this->load->controller('common/footer');

                if(isset($this->request->post['account_tab'])){
                    $json = json_encode($data['account_content'], JSON_HEX_QUOT | JSON_HEX_TAG);

                    header('Content-Type: application/json; charset=UTF-8');
                    echo $json;
                }
                else{
                    $this->view->response('Account/account', $data);
                }
            }
            else{
                header('Location: /login');
            }

        }

        public function loginAction()
        {
            if(!$this->session->has('auth')){

                $this->view->asset->setTitle('Вход');

                $data['header'] = $this->load->controller('common/header');
                $data['footer'] = $this->load->controller('common/footer');
                $this->view->response('Account/login', $data);
            }
            else{
                header('Location: /account');
            }
        }

        public function registerAction()
        {
            if(!$this->session->has('auth')){

                $this->view->asset->setTitle('Регистрация');
                $this->view->asset->setJs('/public/style/js/forms.js');

                $data = array();

                $data['place_name_msg'] = '';
                $data['user_fullname_msg'] = '';
                $data['user_email_msg'] = '';
                $data['user_password_msg'] = '';

                if(!empty($this->request->post)){
                    if($this->request->has('place_name', 'post') &&
                        $this->request->has('user_fullname', 'post') &&
                        $this->request->has('user_email', 'post') &&
                        $this->request->has('user_password', 'post') &&
                        $this->request->has('user_confirm', 'post')
                    ){

                        if(preg_match("#^([a-zA-Z]*[0-9]*\.*-*_*)+@([a-zA-Z]*\.[a-zA-Z]{2,3})$#", $this->request->post['user_email'])){
                            if($this->request->post['user_password'] == $this->request->post['user_confirm']){
                                devPrint('YES');
                            }
                            else{
                                $data['user_password_msg'] = 'Пароли не совпадают';
                            }
                        }
                        else{
                            $data['user_email_msg'] = 'Некорректный E-mail адрес';
                        }
                    }
                    else{
                        !$this->request->has('place_name', 'post')? $data['place_name_msg'] = 'Поле "название заведения" не должно быть пустым' : $data['place_name_msg'] = '';
                        !$this->request->has('place_name', 'post')? $data['user_fullname_msg'] = 'Поле "Ф.И.О. ответственного лица" не должно быть пустым' : $data['user_fullname_msg'] = '';
                        !$this->request->has('place_name', 'post')? $data['user_email_msg'] = 'Поле "E-mail" не должно быть пустым' : $data['user_email_msg'] = '';
                        !$this->request->has('place_name', 'post')? $data['user_password_msg'] = 'Поле "Пароль" не должно быть пустым' : $data['user_password_msg'] = '';
                        !$this->request->has('place_name', 'post')? $data['user_confirm_msg'] = 'Поле "Подтверждение пароля" не должно быть пустым' : $data['user_confirm_msg'] = '';
                    }
                }

                $data['header'] = $this->load->controller('common/header');
                $data['footer'] = $this->load->controller('common/footer');
                $this->view->response('Account/register', $data);
            }
            else{
                header('Location: /account');
            }
        }

        public function agreementAction()
        {
            $this->view->asset->setTitle('Условия соглашения');

            $data['account_content'] = $this->load->controller('account/agreement');

            $data['column_left'] = $this->load->controller('Account/columnLeft');
            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            if(isset($this->request->post['account_tab'])){
                $json = json_encode($data['account_content'], JSON_HEX_QUOT | JSON_HEX_TAG);

                header('Content-Type: application/json; charset=UTF-8');
                echo $json;
            }
            else{
                header('Location: /');
            }
        }
    }