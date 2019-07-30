<?php
    namespace controllers;
    use core\engine\Controller;

    class PhotoflowController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setTitle('Фотопоток');
            $this->view->asset->setJs('/public/style/Masonry/masonry.pkgd.js');
            $this->view->asset->setJs('/public/style/Masonry/imagesLoaded.js');

            $data = array();

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Photoflow/index', $data);
        }
    }