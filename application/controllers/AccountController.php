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
                $data['msg'] = array();
                $data['msg']['place_name'] = '';
                $data['msg']['user_fullname'] = '';
                $data['msg']['user_email'] = '';
                $data['msg']['user_password'] = '';
                $data['msg']['user_confirm'] = '';

                if(
                    $this->request->has('place_name', 'post') &&
                    $this->request->has('user_fulname', 'post') &&
                    $this->request->has('user_email', 'post') &&
                    $this->request->has('user_password', 'post') &&
                    $this->request->has('user_confirm', 'post')
                ){
//                    if(){

//                    }
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