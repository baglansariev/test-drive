<?php
    namespace application\controllers;
    use application\core\engine\Controller;

    class PlaceController extends Controller
    {
        public function indexAction()
        {
            $this->view->asset->setTitle('Название');

            $this->view->asset->setJs('/public/style/owl-carousel/owl-carousel-switcher.js');

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Places/place-page', $data);
        }

        public function placeListAction()
        {
            $this->view->asset->setTitle('Заведения');

            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Places/places', $data);
        }
    }