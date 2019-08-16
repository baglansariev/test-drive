<?php
    namespace controllers;

    use core\engine\Controller;

    class AboutController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setMetaDesc('Тестовое описание');
            $this->view->asset->setMetaKeys('ключ1, ключ2');
            $this->view->asset->setTitle('О проекте');
            $data = array();

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');

            $this->view->response('About/index', $data);

        }
    }