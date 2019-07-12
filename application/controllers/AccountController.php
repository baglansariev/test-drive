<?php
    namespace application\controllers;
    use application\core\engine\Controller;

    class AccountController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setTitle('Личный кабинет');

            $data['header'] = $this->load->controller('common/HeaderController');
            $data['footer'] = $this->load->controller('common/FooterController');
            $this->view->response('Account/account', $data);
        }

        public function loginAction()
        {
            $this->view->asset->setTitle('Вход');

            $data['header'] = $this->load->controller('common/HeaderController');
            $data['footer'] = $this->load->controller('common/FooterController');
            $this->view->response('Account/login', $data);

        }

        public function registerAction()
        {
            $this->view->asset->setTitle('Регистрация');

            $data['header'] = $this->load->controller('common/HeaderController');
            $data['footer'] = $this->load->controller('common/FooterController');
            $this->view->response('Account/register', $data);
        }

        public function agreementAction()
        {
            $this->view->asset->setTitle('Условия соглашения');

            $data['header'] = $this->load->controller('common/HeaderController');
            $data['footer'] = $this->load->controller('common/FooterController');
            $this->view->response('Account/account', $data);
        }
    }