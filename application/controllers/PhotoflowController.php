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
            $data['photos'] = array();

            $photoflow_model = $this->load->model('photoflow/PhotoFlow');
            $photos = $photoflow_model->getAllPhotos();

            if($photos){
                foreach ($photos as $key => $photo) {
                    $data['photos'][$key]['id'] = $photo['id'];
                    $data['photos'][$key]['img_url'] = $this->yandexDisk->getResource($photo['img_url'])->getLink();
                    $data['photos'][$key]['album_id'] = $photo['album_id'];
                }
            }


            $data['header'] = $this->load->controller('common/header');
            $data['footer'] = $this->load->controller('common/footer');
            $this->view->response('Photoflow/index', $data);
        }
    }