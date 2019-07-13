<?php
    namespace application\controllers;
    use application\core\engine\Controller;

    class AccountController extends Controller
    {
        public function indexAction()
        {
            if($this->session->has('auth') && $this->session->get('auth') == true){

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